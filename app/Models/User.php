<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class User extends Authenticatable {
    use SoftDeletes,
        \App\Models\Traits\HasAttach,
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
            'sizes' => ['large' => 'resize,400x400', 'small' => 'crop,150x150'],
        ],
    ];
    public $profileRules = [
        'name' => 'required|min:4',
        'email' => 'required|email|unique:users,email',
        'password' => 'required|confirmed|min:8',
        'image' => 'nullable|image|max:4000'
    ];
    public $rules = [
        'type' => 'required|in:recruiter,employee',
        'name' => 'required|min:4',
        'email' => 'required|email|unique:users,email',
        'mobile' => 'required|mobile',
        'password' => 'required|confirmed|min:8',
        'image' => 'nullable|image|max:4000'
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
    public $changePasswordRules = [
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
                // \App\Jobs\UserCreated::dispatch($row);
            }
        });
    }

    public function getRoles() {
        return \App\Models\Role::where('id', '>', 1)->pluck('title', 'id');
    }

    public function role() {
        return $this->belongsTo(Role::class, 'role_id')->withDefault();
    }

    public function includes() {
        return $this;
    }

    public function single_includes() {
        return $this;
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
                    'Type'=>$this->type,
                    'Name' => $row->name,
                    'Email' => $row->email,
                    'Mobile' => $row->mobile_number,
                    'Created at' => @$row->created_at,
                ];
            });
    }
    public function updateToken($row) {
        $row->token = generateToken(request('email'));
        $row->save();
        request()->headers->set('Authorization', 'Bearer ' . $row->token);
    }
}
