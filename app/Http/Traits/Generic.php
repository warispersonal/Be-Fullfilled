<?php

namespace App\Http\Traits;

use Illuminate\Support\Carbon;
use Zend\Diactoros\Request;

trait Generic
{
    public function getCustomizeDate($date)
    {
        $timestamp = strtotime($date);
        $day = date('F d, Y', $timestamp);
        return $day;
    }

    public function getCustomizeDateAndTime($date)
    {
        $timestamp = strtotime($date);
        $day = date('F d, Y H:i:s', $timestamp);
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

    public function changeDateFormat($originalDate)
    {
        $newDate = date($originalDate);
        $newDate  = Carbon::createFromFormat('d/m/Y', $newDate)->format('d-m-Y');
        $newDate = Carbon::parse($newDate);
        return $newDate;
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
