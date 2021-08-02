<?php

namespace App\Http\Resources;

use App\FocusDay;
use Illuminate\Http\Resources\Json\JsonResource;

class UserScoreCardFilterResource extends JsonResource
{
    public $scorecard;

    public function __construct($resource)
    {
        parent::__construct($resource);

    }

    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'color' => $this->color,
            'result' => round(($this->sum / $this->count), 2)
        ];
    }
}
