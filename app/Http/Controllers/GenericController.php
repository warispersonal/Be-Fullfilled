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


    public static function saveMediaFile($image_file, $input_name, $path)
    {
        if ($image_file->hasFile($input_name)) {
            ini_set('memory_limit', '-1');
            $file = $image_file->file($input_name);
            $extension = $image_file->file($input_name)->extension();
            $save_audio_file = time() . '.' . $file->getClientOriginalName();
            $file->move($path, $save_audio_file);

            $imageType = 0;
            if ($extension == "pdf") {
                $imageType = 2;
            } elseif ($extension == "WEBM" || $extension == "MPG" || $extension == "MP4" || $extension == "MOV" || $extension == "mkv") {
                $imageType = 1;
            }
            $media = new Media();
            $media->link = $save_audio_file;
            $media->type = $imageType;
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
