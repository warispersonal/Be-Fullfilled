<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PodcastsResource extends JsonResource
{
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
            'date' => $this->customizeDates,
            'thumbnail' => $this->image,
            'media' => $this->media,
            'mediaType' => $this->mediaValue,
        ];
    }
}
