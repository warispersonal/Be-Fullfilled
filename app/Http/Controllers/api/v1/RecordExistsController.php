<?php

namespace App\Http\Controllers\api\v1;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;

class RecordExistsController extends Controller
{
    public static function isEmailExists($email){
        $user = User::where('email', $email)->first();
        if($user){
            return true;
        }
        return false;
    }
    public static function isCellNoExists($cellNo){
        $user = User::where('phone_number', $cellNo)->first();
        if($user){
            return true;
        }
        return false;
    }
}
