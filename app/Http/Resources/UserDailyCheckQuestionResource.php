<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class UserDailyCheckQuestionResource extends JsonResource
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
            'status' => $this->status == 0 ? "No" : "Yes",
            'user' =>  new UserResource($this->user),
            'daily_check_question' => new DailyCheckQuestionResource($this->daily_check_question),
        ];
    }
}
