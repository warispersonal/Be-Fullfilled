<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ShoppingResource extends JsonResource
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
            'product_id' => $this->product_id,
            'title' => $this->product->title ?? "",
            'price' => $this->product->price ?? "",
            'user_id' => $this->user_id,
            'quantity' => $this->quantity,
        ];
    }
}
