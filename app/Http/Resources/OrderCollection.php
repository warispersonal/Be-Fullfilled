<?php

namespace App\Http\Resources;

use App\Http\Traits\PaginationTraits;
use Illuminate\Http\Resources\Json\ResourceCollection;

class OrderCollection extends ResourceCollection
{
    use PaginationTraits;
    public function toArray($request)
    {
        return [
            'pagination' => $this->pagination_template($this),
            'data' => OrderResource::collection($this->collection)
        ];
    }
}
