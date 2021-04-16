<?php

namespace App;

use App\Http\Controllers\GenericController;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

class FlipTheSwitch extends Model
{
    use \App\Http\Traits\Media;

    protected $guarded = [
        'title',
        'date',
        'media_id',
        'image_id'
    ];

    public function image(){
        return $this->belongsTo(Image::class);
    }

    public function media(){
        return $this->belongsTo(Media::class);
    }

    public function getImageAttribute(){
        return $this->getImage($this->image_id, env('FLIP_THE_SWITCH_IMAGES'));
    }

    public function getMediaAttribute()
    {
        return $this->getMedia($this->media_id, env('FLIP_THE_SWITCH_MEDIA'));
    }

}
