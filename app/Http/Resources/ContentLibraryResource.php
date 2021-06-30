<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ContentLibraryResource extends JsonResource
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
            'title' => $this->title,
            'description' => $this->description,
            'date' => $this->customizeDates,
            'thumbnail' => $this->image,
            'media' => $this->media,
            'mediaType' => $this->media_type,
            'tags' => TagResource::collection($this->tags)
        ];
    }
}
