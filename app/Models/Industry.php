<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;

class Industry extends BaseModel {
    use \Laravel\Scout\Searchable,
        \App\Models\Traits\CreatedBy;

    protected $table = "industries";
    protected $guarded = [
        'deleted_at',
    ];
    protected $hidden = [
        'deleted_at',
    ];
    public $rules = [
        'title' => 'required',
    ];
    public function toSearchableArray() {
        $array = [
            'title' => $this->title,
        ];
        return $array;
    }
    public function scopeFilterAndSort() {
        return $this
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
                    'Title' => @$row->title,
                    'Created at' => @$row->created_at,
                ];
            });
    }

}
