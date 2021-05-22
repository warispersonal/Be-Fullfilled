<?php

namespace App\Http\Controllers\api\v1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Mockery\Exception;
use Twilio\Exceptions\TwilioException;
use Twilio\Rest\Client;


class Twilio extends Controller
{
    public function sendConfirmationMessage(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'phone' => 'required'
        ]);
        if ($validator->fails()) {
            $error = $validator->errors()->first();
            return $this->validationFailure($error);
        } else {
            $account_sid = getenv("TWILIO_SID");
            $auth_token = getenv("TWILIO_AUTH_TOKEN");
            $twilio_number = getenv("TWILIO_NUMBER");
            $client = new Client($account_sid, $auth_token);
            $six_digit_random_number = mt_rand(1000, 9999);
            $message = "Your Befullfill verification code is " . $six_digit_random_number;
            try {
                $client->messages->create($request->phone, ['from' => $twilio_number, 'body' => $message]);
                return $this->success('Code send successfully', ['code' => $six_digit_random_number]);
            } catch (TwilioException  $e) {
                return $this->failure('This is not valid phone number');
            }
        }

    }

    public function sendResetPasswordOnMobile(Request $request)
    {
        $request->validate([
            'phone_number' => 'required'
        ]);
        if (RecordExistsController::isCellNoExists($request->phone_number)) {
            $account_sid = getenv("TWILIO_SID");
            $auth_token = getenv("TWILIO_AUTH_TOKEN");
            $twilio_number = getenv("TWILIO_NUMBER");
            $client = new Client($account_sid, $auth_token);
            $six_digit_random_number = mt_rand(1000, 9999);
            $message = "Your reset password code is " . $six_digit_random_number;
            $client->messages->create($request->phone_number, ['from' => $twilio_number, 'body' => $message]);
            return $this->success('Code send successfully', ['code' => $six_digit_random_number]);
            try {

            } catch (TwilioException  $e) {
                return $this->failure('This is not valid phone number');
            }
        } else {
            return $this->failure('Sorry, This user is not exist in our system', 404);
        }
    }

}
