<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource {

    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request) {
        $row=[
            'type' => 'users',
            'id' => $this->id,
            'attributes' => [
                'role_id'=>$this->role_id,
                'company_id'=>$this->company_id,
                'is_company_admin'=>$this->is_company_admin,
                'type' => $this->type,
                'name' => $this->name,
                'email' => $this->email,
                'mobile' => $this->mobile,
                'image' => $this->image,
                'last_logged_in_at' => $this->last_logged_in_at,
                'last_ip' => $this->last_ip,
                'created_at' =>date('Y-m-d',strtotime($this->created_at)),
                'token' => $this->token,
                /////////////////////////// Profile
                'gender'=>$this->gender,
                'country_id'=>$this->country_id,
                'city'=>$this->city,
                'national_id'=>$this->national_id,
                'degree'=>$this->degree,
                'birth_date'=>$this->birth_date,
                'bio'=>$this->bio,
                'youtube_video'=>$this->youtube_video,
                'youtube_id' => ($this->youtube_video)?youtubeID($this->youtube_video):'',
                /// ///////////////////////
            ],
            'relationships' => [
                'company' => new TinyCompanyResource($this->whenLoaded('company')),
                'country' => new TinyCountryResource($this->whenLoaded('country')),
            ],
            'token'=>token(),
        ];
        return $row;
    }
}
