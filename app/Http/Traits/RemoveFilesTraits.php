<?php

namespace App\Http\Traits;

use App\Image;
use App\Media;
use Illuminate\Support\Facades\File;

trait RemoveFilesTraits
{
    public function removeImage($file_path, $image_id)
    {
        $image = Image::find($image_id);
        if ($image) {
            $fileName = $image->file;
            $path = public_path(). '/' . $file_path .  '/' . $fileName;
            if (File::exists($path)) {
                unlink($path);
            }
            $image->delete();
        }
    }
    public function removeMedia($file_path, $media_id)
    {
        $media = Media::find($media_id);
        if ($media) {
            $fileName = $media->link;
            $path = public_path(). '/' . $file_path .  '/' .  $fileName;
            if (File::exists($path)) {
                unlink($path);
            }
            $media->delete();
        }
    }
}
