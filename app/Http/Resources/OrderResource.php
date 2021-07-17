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
            'shipping_address' => new AddressResource($this->address),
            'order_status' => $this->orderStatus->name ?? "",
            'total_price' => $this->total_price,
            'created_at' => $this->date,
            'completed_at' => $this->completed_at,
            'user' => new UserResource($this->user),
            'products' => OrderProductResource::collection($this->order_products)
        ];
    }
}
