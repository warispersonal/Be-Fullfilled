<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class AddressResource extends JsonResource
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
            'id' => $this->id,
            'city' => $this->city,
            'zip_code' => $this->zip_code,
            'street_address' => $this->street_address,
            'user_id' => $this->user_id,
        ];
    }
}
