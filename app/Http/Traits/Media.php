<?php

namespace App\Http\Traits;
use App\Http\Controllers\GenericController;
use App\Image;

trait Media
{
    public function getImage($image_id, $path){
        if($image_id == null) {
            return GenericController::thumbnail();
        }
        else{
            $image = Image::find($image_id);
            return asset($path.'/'.$image->file);
        }
    }

    public function getMedia($media_id, $path){
        if($media_id != null) {
            $media = \App\Media::find($media_id);
            return asset($path.'/'.$media->link);
        }
        return  null;
    }

    public function getMediaTypeAttribute(){
        if($this->media_id != null) {
            $media = \App\Media::find($this->media_id);
            if($media->type == 0){
                return 'audio';
            }
            elseif($media->type == 1){
                return "video";
            }
            elseif($media->type == 2){
                return "pdf";
            }
            return null;
        }
        return  null;
    }

    public function getCustomizeDatesAttribute()
    {
        $timestamp = strtotime($this->date);
        $day = date('F d, Y', $timestamp);
        return $day;
    }
}
