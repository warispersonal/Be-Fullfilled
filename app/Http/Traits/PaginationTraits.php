<?php

namespace App\Http\Traits;
trait PaginationTraits
{
    public function pagination_template($collection){
        return[
            'count' => $collection->count(),
            'total' => $collection->total(),
            'prev'  => $collection->previousPageUrl(),
            'next'  => $collection->nextPageUrl(),
        ];
    }
}
