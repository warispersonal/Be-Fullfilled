<?php

namespace App\Http\Controllers\api\v1;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;

class IsRecordExists extends Controller
{
    public function email($user){
        $user = User::where('email', $user)->first();
        if($user){
            return $this->success('Email is exists', [] );
        }
        else{
            return $this->failure('Email is not exists');
        }
    }

    public function phone($user){
        $user = User::where('phone_number', $user)->first();
        if($user){
            return $this->success('Phone number is exists', [] );
        }
        else{
            return $this->failure('Phone number is not exists');
        }
    }
}
