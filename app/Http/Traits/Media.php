<?php

namespace App\Http\Traits;

use App\Http\Controllers\Admin\PodcastController;
use App\Http\Controllers\GenericController;
use App\Image;

trait Media
{
    function url_exists($url)
    {
        $headers = get_headers($url);
        if (stripos($headers[0], "200 OK")) {
            return true;
        } else {
            return false;
        }
    }

    public function getImage($image_id, $path)
    {
        if ($image_id == null) {
            return GenericController::thumbnail();
        } else {
            $image = Image::find($image_id);
            if ($image) {
                $exists = $this->url_exists(asset($path . '/' . $image->file));
                if ($exists) {
                    return asset($path . '/' . $image->file);
                } else {
                    return asset("thumbnail/no_image.png");
                }
            }
            return asset("thumbnail/no_image.png");
        }
    }

    public function getMedia($media_id, $path)
    {
        if ($media_id != null) {
            $media = \App\Media::find($media_id);
            if ($media) {
                return asset($path . '/' . $media->link);
            }
            return null;
        }
        return null;
    }

    public function getMediaTypeAttribute()
    {
        if ($this->media_id != null) {
            $media = \App\Media::find($this->media_id);
            if ($media) {
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
        return null;
    }


    public function getMediaValueAttribute()
    {
        if ($this->media_id != null) {
            $media = \App\Media::find($this->media_id);
            if ($media) {
                return $media->type;
            }
            return null;
        }
        return null;
    }

    public function getCustomizeDatesAttribute()
    {
        $timestamp = strtotime($this->date);
        $day = date('l F d, Y', $timestamp);
        return $day;
    }

}
