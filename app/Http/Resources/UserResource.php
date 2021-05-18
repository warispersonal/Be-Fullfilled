<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            "id" => $this->id ,
            "name" => $this->name ,
            "email" => $this->email ,
            "profile" => $this->social_account_type == "user" ? $this->profile : $this->social_account_profile_image_url,
            "phone_number" => $this->phone_number ,
            "city" => $this->city,
            "zipcode" => $this->zipcode ,
            "street_address" => $this->street_address
        ];
    }
}
