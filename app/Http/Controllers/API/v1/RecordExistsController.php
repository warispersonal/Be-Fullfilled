<?php

namespace App\Http\Controllers\API\V1;

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
    public static function isUserEmailCellExists($user){
        if(self::isCellNoExists($user) || self::isEmailExists($user)){
            return true;
        }
        else{
            return false;
        }
    }
}
