<?php

namespace App\Models;

class Company extends BaseModel {
    use
        \Laravel\Scout\Searchable,
        \App\Models\Traits\HasAttach;

    protected $table = "companies";
    protected $guarded = [
        'deleted_at',
    ];
    protected $hidden = [
        'deleted_at',
    ];
    public $rules = [
        'title' => 'required',
        'industry_id' => 'required',
        'country_id' => 'required',
        'city' => 'required',
        'address' => 'required',
        'commercial_registry' => 'required|max:4000',
        'tax_id_card' => 'required|max:4000',
        'plan_id' => 'required',
        'expiry_date'=>'required|date',
        'image' => 'nullable|image|max:4000',
    ];
    public $editRules = [
        'title' => 'required',
        'industry_id' => 'required',
        'country_id' => 'required',
        'city' => 'required',
        'address' => 'required',
        'commercial_registry' => 'required|max:4000',
        'tax_id_card' => 'required|max:4000',
        'image' => 'nullable|image|max:4000',
    ];
    static $attachFields = [
        'image' => [
            'sizes' => ['large' => 'resize,400x400', 'small' => 'crop,150x150'],
        ],
        'commercial_registry' => [
            'path' => 'uploads',
        ],
        'tax_id_card' => [
            'path' => 'uploads',
        ],
    ];

    public function toSearchableArray() {
        $array = [
            'title' => $this->title,
        ];
        return $array;
    }

    public function plan() {
        return $this->belongsTo(Plan::class, 'plan_id')->withTrashed()->withDefault();
    }

    public function industry() {
        return $this->belongsTo(Industry::class, 'industry_id')->withTrashed()->withDefault();
    }

    public function country() {
        return $this->belongsTo(Country::class, 'country_id')->withTrashed()->withDefault();
    }

    public function includes() {
        return $this->with(['plan','industry', 'country']);
    }

    public function scopeFilterAndSort() {
        return $this->includes()
            ->when(request('plan_id'), function ($q) {
                return $q->where('plan_id', request('plan_id'));
            })
            ->when(request('industry_id'), function ($q) {
                return $q->where('industry_id', request('industry_id'));
            })
            ->when(request('country_id'), function ($q) {
                return $q->where('country_id', request('country_id'));
            })
            ->when(request('title'), function ($q) {
                return $q->where('title', 'LIKE', '%' . trim(request('title')) . '%');
            })
            ->when(request('order_field'), function ($q) {
                return $q->orderBy((request('order_field')), (request('order_type')) ?: 'desc');
            })
            ->orderBy('id', 'desc');
    }

    public function export($rows, $fileName) {
        return (new \Rap2hpoutre\FastExcel\FastExcel($rows))
            ->download($fileName . "_" . date("Y-m-d H:i:s") . '.xlsx', function ($row) {
                return [
                    'ID' => $row->id,
                    'Plan' => @$row->plan->title,
                    'Title' => $row->title,
                    'Industry' => @$row->industry->title,
                    'Country' => @$row->country->title,
                    'City' => @$row->city,
                    'Address' => @$row->address,
                    'Industry' => @$row->industry->title,
                    'Website' => $row->website,
                    'Linked' => $row->linked,
                    'Facebook' => $row->facebook,
                    'Instagram' => $row->instagram,
                    'Commercial registry' => $row->commercial_registry,
                    'Tax ID Card' => $row->tax_id_card,
                    'Image' => $row->image,
                    'Created at' => @$row->created_at,
                ];
            });
    }

}
