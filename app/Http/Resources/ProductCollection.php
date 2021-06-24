<?php

namespace App\Http\Resources;

use App\Http\Traits\PaginationTraits;
use Illuminate\Http\Resources\Json\ResourceCollection;

class ProductCollection extends ResourceCollection
{
    use PaginationTraits;
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [

            'pagination' => $this->pagination_template($this),
            'data' => ProductResource::collection($this->collection)
        ];
    }
}
