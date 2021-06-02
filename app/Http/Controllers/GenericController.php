<?php

namespace App\Http\Controllers;

use App\Image;
use App\Media;
use Illuminate\Http\Request;
use phpDocumentor\Reflection\Types\This;

class GenericController extends Controller
{
    public static function saveImage($image_file, $input_name, $path)
    {
        if ($image_file->hasFile($input_name)) {
            ini_set('memory_limit', '-1');
            $file = $image_file->file($input_name);
            $save_image = time() . '.' . $file->getClientOriginalName();
            $file->move($path, $save_image);
            $image = new Image();
            $image->file = $save_image;
            $image->save();
            return $image;
        } else {
            return null;
        }
    }

    public static function saveImageSameModel($image_file, $input_name, $path)
    {
        if ($image_file->hasFile($input_name)) {
            ini_set('memory_limit', '-1');
            $file = $image_file->file($input_name);
            $save_image = time() . '.' . $file->getClientOriginalName();
            $file->move($path, $save_image);
            return $save_image;
        } else {
            return null;
        }
    }


    public static function saveMediaFile($image_file, $input_name, $path, $mediaType=null)
    {

        if ($image_file->hasFile($input_name)) {
            ini_set('memory_limit', '-1');
            $file = $image_file->file($input_name);
            $extension = $image_file->file($input_name)->extension();
            $save_audio_file = time() . '.' . $file->getClientOriginalName();
            $file->move($path, $save_audio_file);
            if($mediaType == "audio"){
                $mediaType = 0;
            }
            else if ($mediaType == "video"){
                $mediaType = 1;
            }
            else if($mediaType == "pdf"){
                $mediaType = 2;
            }
            else{
                $mediaType = 9;
            }
            $media = new Media();
            $media->link = $save_audio_file;
            $media->type = $mediaType;
            $media->save();
            return $media;
        } else {
            return null;
        }
    }

    public static function thumbnail()
    {
        return asset('images/thumbnail/thumbnail.png');
    }


}
