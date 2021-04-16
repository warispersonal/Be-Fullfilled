<?php

namespace App\Http\Controllers\API\V1;

use App\Http\Controllers\Controller;
use App\Mail\ResetPasswordCode;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class EmailSendController extends Controller
{
    public function sendResetPasswordOnEmail(Request $request)
    {
        $request->validate([
            'email' => 'required'
        ]);
        if (RecordExistsController::isEmailExists($request->email)) {
            $six_digit_random_number = mt_rand(1000, 9999);
            Mail::to($request->email)->send(new ResetPasswordCode($six_digit_random_number));
            return $this->success('Code send successfully', ['code' => $six_digit_random_number]);
        } else {
            return $this->failure('Sorry, This user is not exist in our system', 404);
        }
    }
}
