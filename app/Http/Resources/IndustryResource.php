<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class IndustryResource extends JsonResource {

    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request) {
        $row=[
            'type' => 'industries',
            'id' => $this->id,
            'attributes' => [
                'title'=>$this->title,
                'created_at' =>date('Y-m-d',strtotime($this->created_at))
            ]
        ];
        return $row;
    }
}
