<?php

namespace App\Models;

class Plan extends BaseModel {
    use \App\Models\Traits\CreatedBy,
        \Laravel\Scout\Searchable;

    protected $table = "plans";
    protected $guarded = [
        'deleted_at',
    ];
    protected $hidden = [
        'deleted_at',
    ];
    public $rules = [
        'title' => 'required',
        'applicants_unlock_count' => 'required|integer',
        'posts_count' => 'required|integer',
        'duration_in_month' => 'required|integer',
        'price' => 'required|numeric',
    ];

    public function toSearchableArray() {
        $array = [
            'title' => $this->title,
        ];
        return $array;
    }

    public function includes() {
        return $this;
    }

    public function scopeFilterAndSort() {
        return $this->includes()
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
                    'Title' => $row->title,
                    'Applicants unlock count' => @$row->applicants_unlock_count,
                    'Posts count' => @$row->posts_count,
                    'Duration in month' => @$row->duration_in_month,
                    'Price' => @$row->price,
                    'Created at' => @$row->created_at,
                ];
            });
    }

}
