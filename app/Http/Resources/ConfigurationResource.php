<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ConfigurationResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param \Illuminate\Http\Request $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'general_notification' => $this->push_notification == 0 ? false : true,
            'partner_invitation' => $this->partner_invitation == 0 ? false : true,
            'location_access' => $this->location_access == 0 ? false : true,
            'user_id' => $this->user_id,
        ];
    }
}
