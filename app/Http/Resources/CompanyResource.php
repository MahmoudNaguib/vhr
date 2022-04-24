<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CompanyResource extends JsonResource {

    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request) {
        $row=[
            'type' => 'companies',
            'id' => $this->id,
            'attributes' => [
                'title'=>$this->title,
                'industry_id'=>$this->industry_id,
                'country_id'=>$this->country_id,
                'city'=>$this->city,
                'address'=>$this->address,
                'website'=>$this->website,
                'linkedin'=>$this->linkedin,
                'facebook'=>$this->facebook,
                'instagram'=>$this->instagram,
                'commercial_registry'=>$this->commercial_registry,
                'tax_id_card'=>$this->tax_id_card,
                'image'=>$this->image,
                'created_by'=>$this->created_by,
                'created_at' =>date('Y-m-d',strtotime($this->created_at))
            ],
            'relationships' => [
                'country' => new TinyCountryResource($this->whenLoaded('country')),
                'industry' => new TinyIndustryResource($this->whenLoaded('industry')),
                'creator' => new TinyUserResource($this->whenLoaded('creator')),
            ],
        ];
        return $row;
    }
}
