<?php

namespace App;

use App\Http\Controllers\GenericController;
use Illuminate\Database\Eloquent\Model;

class FlipTheSwitch extends Model
{
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
        if($this->image_id == null) {
            return GenericController::thumbnail();
        }
        else{
            $image = Image::find($this->image_id);
            return asset(env('FLIP_THE_SWITCH_IMAGES').'/'.$image->file);
        }
    }

    public function getMediaAttribute(){
        if($this->media_id != null) {
            $media = Media::find($this->media_id);
            return asset(env('FLIP_THE_SWITCH_MEDIA').'/'.$media->link);
        }
        return  null;
    }

    public function getMediaTypeAttribute(){
        if($this->media_id != null) {
            $media = Media::find($this->media_id);
            return $media->type;
        }
        return  null;
    }
}
