<?php

namespace App\Http\Traits;
trait Generic
{
    public static function getCustomizeDate($date)
    {
        $timestamp = strtotime($date);
        $day = date('F d, Y', $timestamp);
        return $day;
    }

    public static function uploadMediaFile($file, $input_name, $location)
    {
        if ($file->hasFile($input_name)) {
            ini_set('memory_limit', '-1');
            $file = $file->file($input_name);
            $file_name = time() . '.' . $file->getClientOriginalName();
            $file->move($location, $file_name);
            return $file_name;
        }
    }
}
