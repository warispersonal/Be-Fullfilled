<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class NotesResource extends JsonResource
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
          "id" => $this->id,
          "title_notes" => $this->title_notes ,
          "notes_description" => $this->notes_description ,
          "created_at" => $this->created_at->format('Y-m-d') 
      ];
    }
}
