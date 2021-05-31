<?php

namespace App\Http\Traits;

use Illuminate\Support\Carbon;

trait Generic
{
    public function getCustomizeDate($date)
    {
        $timestamp = strtotime($date);
        $day = date('F d, Y', $timestamp);
        return $day;
    }

    public function uploadMediaFile($file, $input_name, $location)
    {
        if ($file->hasFile($input_name)) {
            ini_set('memory_limit', '-1');
            $file = $file->file($input_name);
            $file_name = time() . '.' . $file->getClientOriginalName();
            $file->move($location, $file_name);
            return $file_name;
        }
    }

    public function changeDateFormat($value)
    {
        return date('Y-m-d', strtotime($value));
    }

    public function rulesDefine($fileType)
    {
        if ($fileType == 'audio') {
            $rules['link'] = 'mimes:mp3,mp4';
        } else if ($fileType == "video") {
            $rules['link'] = 'mimes:mp3,mp4';
        } else if ($fileType == "pdf") {
            $rules['link'] = 'mimes:mp3,mp4';
        }

        return $rules;
    }
}
