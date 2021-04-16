<?php

namespace App\Http\Controllers\API\V1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class GenericController extends Controller
{

    public static function getDateFromTimeStamp($timestamp)
    {
        $timestamp = Carbon::parse($timestamp);
        $date = $timestamp->format('M d Y');
        return $date;
    }

    public static function getCustomizeDatesAttribute($date)
    {
        $timestamp = strtotime($date);
        $day = date('F d, Y', $timestamp);
        return $day;
    }
}
