<?php

namespace App\Http\Controllers\api\v1;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function login(Request $request)
    {
        $user = User::where('email', $request->email)->first();
        if ($user) {
            if (Hash::check($request->password, $user->password)) {
                if($request->device_key){
                    $user->device_key = $request->device_key ?? "";
                    $user->save();
                }
                $token = $user->createToken('Laravel Password Grant Client')->accessToken;
                $response = ['token' => $token];
                return $this->success('Login Successful', $response);
            } else {
                return $this->failure('Password mismatch');
            }
        } else {
            return $this->failure('User not found',404);
        }
    }
    public function unauthorized()
    {
        return $this->failure('Un-authorized');
    }
}
