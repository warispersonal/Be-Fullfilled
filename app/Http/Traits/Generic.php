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
}
