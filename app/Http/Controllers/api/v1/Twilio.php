<?php

namespace App\Http\Controllers\api\v1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Twilio\Rest\Client;


class Twilio extends Controller
{
    public function sendConfirmationMessage(Request $request){
        $request->validate([
           'phone' => 'required'
        ]);


        $account_sid = getenv("TWILIO_SID");
        $auth_token = getenv("TWILIO_AUTH_TOKEN");
        $twilio_number = getenv("TWILIO_NUMBER");
        $client = new Client($account_sid, $auth_token);
        $six_digit_random_number = mt_rand(100000, 999999);
        $message = "Your Befullfill verification code is " . $six_digit_random_number;
        $client->messages->create($request->phone, ['from' => $twilio_number, 'body' => $message] );
        return response(['code' => $six_digit_random_number ], 200);

    }
}
