<?php

namespace App\Models;

class Company extends BaseModel {
    use \App\Models\Traits\CreatedBy;

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
        'image' => 'required|image|max:4000',
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
    public function industry() {
        return $this->belongsTo(Industry::class, 'industry_id')->withDefault();
    }

    public function country() {
        return $this->belongsTo(Country::class, 'country_id')->withDefault();
    }

    public function includes() {
        return $this->with(['industry','country','creator']);
    }

    public function scopeFilterAndSort() {
        return $this->includes()
            ->when(request('created_by'), function ($q) {
                return $q->where('created_by', request('created_by'));
            })
            ->when(request('industry_id'), function ($q) {
                return $q->where('industry_id', request('industry_id'));
            })
            ->when(request('country_id'), function ($q) {
                return $q->where('country_id', request('country_id'));
            })
            ->when(request('title'), function ($q) {
                return $q->where('title', 'LIKE', '%' . request('title') . '%');
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
