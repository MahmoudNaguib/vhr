<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class User extends Authenticatable {
    use SoftDeletes,
        \App\Models\Traits\HasAttach,
        \App\Models\Traits\CreatedBy,
        HasFactory;

    protected $attributes = [
        'confirmed' => 0,
        'is_active' => 1,
    ];
    protected $table = "users";
    protected $guarded = [
        'deleted_at',
        'image',
    ];
    protected $hidden = [
        'password',
        'remember_token',
        'confirm_token',
        'password_token',
        'confirmed',
        'is_active',
        'created_by',
        'updated_at',
        'deleted_at',
    ];
    static $attachFields = [
        'image' => [
            'sizes' => ['large' => 'resize,300x300', 'small' => 'crop,150x150'],
        ],
    ];
    public $editRecruiter = [
        'gender' => 'required|in:m,f',
        'name' => 'required|min:4',
        'mobile' => 'required|mobile',
        'image' => 'nullable|image|max:4000'
    ];
    public $editEmployee = [
        'gender' => 'required|in:m,f',
        'name' => 'required|min:4',
        'mobile' => 'required|mobile',
        'country_id'=>'required',
        'city'=>'required',
        'national_id'=>'required',
        'birth_date'=>'required|date|before_or_equal:2010-01-01',
        'degree'=>'required',
        'bio'=>'required',
        'image' => 'nullable|image|max:4000'
    ];
    public $rules = [
        'type' => 'required|in:recruiter,employee',
        'name' => 'required|min:4',
        'email' => 'required|email|unique:users,email',
        'mobile' => 'required|mobile|unique:users,mobile',
        'password' => 'required|confirmed|min:8',
    ];
    public $loginRules = [
        'email' => 'required|email',
        'password' => 'required|min:8',
        'push_token' => 'nullable|min:4',
    ];
    public $forgotRules = [
        'email' => 'required|email',
    ];
    public $resetRules = [
        'password' => 'required|confirmed|min:8',
    ];
    public $changePassword = [
        'old_password' => 'required|min:8',
        'password' => 'required|confirmed|min:8',
    ];
    public $changeImageRules = [
        'image' => 'required|image|max:4000'
    ];

    public static function boot() {
        parent::boot();
        static::created(function ($row) {
            if (!app()->environment('testing')) {
                \App\Jobs\UserCreated::dispatch($row);
            }
        });
    }

    public function register() {
        $token = generateToken(request('email'));
        request()->request->add([
            'confirm_token' => md5(request('email')) . RandomString(10) . md5(time()),
            'token' => $token,
            'image' => resizeImage(public_path() . '/images/users/avatar.png', \App\Models\User::$attachFields['image']['sizes'])
        ]);
        //// if type is recruiter
        if (request('type') == 'recruiter') {
            request()->request->add(['is_company_admin' => 1]);
        }
        if ($row = \App\Models\User::create(request()->except(['password_confirmation', 'accept']))) {
            return $row;
        }
    }

    public function getTypes() {
        return [
            'recruiter' => trans('app.Recruiter'),
            'employee' => trans('app.Employee'),
        ];
    }

    public function getCountries() {
        return \App\Models\Country::pluck('title', 'id');
    }

    public function getGenders() {
        return [
            'm' => trans('app.Male'),
            'f' => trans('app.Female'),
        ];
    }

    public function getDegrees() {
        return [
            'primary_school' => trans('app.Primary school'),
            'high_school' => trans('app.High school'),
            'bachelor' => trans('app.Bachelor'),
            'master' => trans('app.Master'),
            'phd' => trans('app.PHD'),
        ];
    }

    public function push_tokens() {
        return $this->hasMany(PushToken::class, 'created_by');
    }

    public function role() {
        return $this->belongsTo(Role::class, 'role_id')->withDefault();
    }

    public function company() {
        return $this->belongsTo(Company::class, 'company_id')->withDefault();
    }

    public function country() {
        return $this->belongsTo(Country::class, 'country_id')->withDefault();
    }

    public function includes() {
        return $this->with(['country']);
    }

    public function notifications() {
        return $this->hasMany(Notification::class, 'user_id');
    }

    public function scopeFilterAndSort() {
        return $this->includes()
            ->when(request('created_by'), function ($q) {
                return $q->where('created_by', request('created_by'));
            })
            ->when(request('name'), function ($q) {
                return $q->where('name', 'LIKE', '%' . request('name') . '%');
            })
            ->when(request('email'), function ($q) {
                return $q->where('email', 'LIKE', '%' . request('email') . '%');
            })
            ->when(request('mobile'), function ($q) {
                return $q->where('mobile', 'LIKE', '%' . request('mobile') . '%');
            })
            ->notSuperAdmin()
            ->when(request('order_field'), function ($q) {
                return $q->orderBy((request('order_field')), (request('order_type')) ?: 'desc');
            })
            ->orderBy('id', 'desc');
    }

    public function scopeActive($query) {
        return $query->where('is_active', '=', 1)->where('confirmed', 1);
    }

    public function scopeAdmin($query) {
        return $query->whereNotNull('role_id');
    }

    public function scopeGuest($query) {
        return $query->where('role_id', '=', NULL);
    }

    public function scopeNotSuperAdmin($query) {
        return $query->where(function ($q) {
            return $q->where('role_id', '!=', 1)
                ->orWhere('role_id', NULL);
        });
    }

    public function getIsAdminAttribute() {
        return ($this->role_id);
    }

    public function getIsSuperAdminAttribute() {
        return ($this->role_id == 1);
    }

    public function getMobileNumberAttribute() {
        return $this->dial_code . $this->mobile;
    }

    public function setPasswordAttribute($value) {
        if (trim($value)) {
            $this->attributes['password'] = bcrypt(trim($value));
        }
    }

    public function export($rows, $fileName) {
        return (new \Rap2hpoutre\FastExcel\FastExcel($rows))
            ->download($fileName . "_" . date("Y-m-d H:i:s") . '.xlsx', function ($row) {
                return [
                    'ID' => $row->id,
                    'Role' => (@$row->role_id) ? $row->role->title : '',
                    'Type' => $this->type,
                    'Name' => $row->name,
                    'Email' => $row->email,
                    'Mobile' => $row->mobile_number,
                    'Created at' => @$row->created_at,
                ];
            });
    }

    public function updateToken($row) {
        $row->token = generateToken($row->email);
        $row->save();
        request()->headers->set('Authorization', 'Bearer ' . $row->token);
    }
}
