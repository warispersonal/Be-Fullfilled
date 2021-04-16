<?php

namespace App;

use App\Http\Controllers\GenericController;
use Illuminate\Database\Eloquent\Model;

class ContentLibrary extends Model
{
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

    public function getImageAttribute(){
        if($this->image_id == null) {
            return GenericController::thumbnail();
        }
        else{
            $image = Image::find($this->image_id);
            return asset(env('CONTENT_LIBRARY_IMAGES').'/'.$image->file);
        }
    }

    public function getMediaAttribute(){
        if($this->media_id != null) {
            $media = Media::find($this->media_id);
            return asset(env('FLIP_THE_SWITCH_MEDIA').'/'.$media->link);
        }
        return  null;
    }

    public function getMediaTypeAttribute()
    {
        if ($this->media_id != null) {
            $media = Media::find($this->media_id);
            if ($media->type == 0) {
                return 'audio';
            } elseif ($media->type == 1) {
                return "video";
            } elseif ($media->type == 2) {
                return "pdf";
            }
            return null;
        }
        return null;
    }

    public function tag()
    {
        return $this->belongsTo(Tag::class);
    }

    public function getCustomizeDatesAttribute()
    {
        $timestamp = strtotime($this->date);
        $day = date('F d, Y', $timestamp);
        return $day;
    }
}
