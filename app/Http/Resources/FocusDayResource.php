<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class FocusDayResource extends JsonResource
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
            "date" => $this->date,
            "focus_value" => $this->focus_value,
            "score_card_id" => $this->score_card_id,
            'score_card' => new ScoreCardResource($this->score_card)
        ];
    }
}
