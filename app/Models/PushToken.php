<?php

namespace App\Models;

class PushToken extends BaseModel {
    use \App\Models\Traits\CreatedBy;

    protected $table = "push_tokens";
    protected $guarded = [
        'deleted_at',
    ];
    protected $hidden = [
        'deleted_at',
    ];
    public $rules = [
        'push_token' => 'required',
    ];

}
