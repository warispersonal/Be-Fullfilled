<?php

namespace App\Http\Resources;

use App\Http\Traits\PaginationTraits;
use Illuminate\Http\Resources\Json\ResourceCollection;

class FlipTheSwitchCollection extends ResourceCollection
{
    use PaginationTraits;
    public function toArray($request)
    {
        return [
            'pagination' => $this->pagination_template($this),
            'data' => FlipTheSwitchResource::collection($this->collection)
        ];
    }
}
