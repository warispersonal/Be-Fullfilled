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
            'shipping_address' => $this->shipping_address,
            'order_status' => $this->orderStatus->name ?? "",
            'total_price' => $this->total_price,
            'user' => new UserResource($this->user),
            'products' => OrderProductResource::collection($this->order_products)
        ];
    }
}
