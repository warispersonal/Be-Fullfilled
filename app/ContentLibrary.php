<?php

namespace App;

use App\Http\Controllers\GenericController;
use Illuminate\Database\Eloquent\Model;

class ContentLibrary extends Model
{
    use \App\Http\Traits\Media;

    protected $guarded = [
        'title',
        'description',
        'date',
        'media_id',
        'tag_id',
        'media_id',
    ];

    public function image()
    {
        return $this->belongsTo(Image::class);
    }

    public function getImageAttribute()
    {
        return $this->getImage($this->image_id, env('CONTENT_LIBRARY_IMAGES'));
    }

    public function getMediaAttribute()
    {
        return $this->getMedia($this->media_id, env('CONTENT_LIBRARY_MEDIA'));
    }

    public function tag()
    {
        return $this->belongsTo(Tag::class);
    }

}
