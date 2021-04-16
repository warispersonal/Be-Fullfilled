<?php

namespace App\Http\Controllers\API\V1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class GenericController extends Controller
{
    public static function deCodeImage(){

    }
    public static function getDateFromTimeStamp($timestamp){
        $timestamp = Carbon::parse($timestamp);
        $date = $timestamp->format('M d Y');
        return $date;
    }
}
