<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class OrderResource extends JsonResource
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
            'product_title' => $this->product->title ?? "",
            'per_unit_price' => $this->price,
            'quantity' => $this->quantity,
            'total_price' => $this->total_price,
            'shipping_address' => $this->shipping_address,
            'user_name' => $this->user->name ?? "",
            'order_status' => $this->orderStatus->name ?? "",
            'user' => new UserResource($this->user),
            'product' => new ProductResource($this->product),
        ];
    }
}
