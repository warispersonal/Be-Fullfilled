<?php

namespace App\Http\Controllers\api\v1;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;

class SocialSetupController extends Controller
{
    public function social_setup(Request $request)
    {
        if ($this->isAccountExists($request)) {
            return $this->login($request);
        } else {
            $user = new User();
            $user->social_account_id = $request->social_account_id;
            $user->social_account_type = $request->social_account_type;
            $user->social_account_profile_image_url = $request->social_account_profile_image_url;
            $user->name = $request->name;
            $user->email = $request->social_account_email;
            $user->social_account_email = $request->social_account_email;
            $user->save();
            return $this->login($request);
        }
    }

    private function isAccountExists(Request $request)
    {
        $social_account_id = $request->social_account_id;
        $user = User::where('social_account_id', $social_account_id)->get();
        if (count($user) > 0) {
            return true;
        }
        return false;
    }

    private function login(Request $request)
    {
        $user = User::where('social_account_id', $request->social_account_id)->first();
        if ($user) {
            $token = $user->createToken('Laravel Password Grant Client')->accessToken;
            $response = ['token' => $token];
            return $this->success('Login Successful', $response);
        }
    }
}
