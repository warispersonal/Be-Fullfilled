<?php

namespace App\Http\Controllers\api\v1;

use App\FeedBack;
use App\Http\Controllers\Controller;
use App\Http\Resources\FeedBackResource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class FeedBackController extends Controller
{
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'service_status' => 'required',
            'what_wrong' => 'required',
        ]);
        if ($validator->fails()) {
            $error = $validator->errors()->first();
            return $this->validationFailure($error);
        } else {
            $feedback = new FeedBack();
            $feedback->service_status = $request->service_status;
            $feedback->what_wrong = $request->what_wrong;
            $feedback->user_id = Auth::id();
            $feedback->save();
            return $this->success("Thanks for sharing feedback", new FeedBackResource($feedback));
        }
    }
}
