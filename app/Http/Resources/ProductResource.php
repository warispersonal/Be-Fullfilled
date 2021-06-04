<?php

namespace App\Http\Resources;

use App\Http\Traits\Generic;
use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
{
    use Generic;
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return[
            'id' => $this->id,
            'title' => $this->title,
            'price' => $this->price,
            'description' => $this->description,
            'ingredient' => $this->ingredient,
            'image' => $this->image,
            'created_at' => $this->getCustomizeDate($this->created_at),
        ];
    }
}
