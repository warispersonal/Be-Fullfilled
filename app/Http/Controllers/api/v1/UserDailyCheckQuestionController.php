<?php

namespace App\Http\Controllers\api\v1;

use App\Http\Controllers\Controller;
use App\Http\Resources\UserDailyCheckQuestionResource;
use App\UserDailyCheckQuestion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserDailyCheckQuestionController extends Controller
{
    public function store(Request $request)
    {
        $daily_check_question_id = $request->question_id;
        $status = $request->status;
        $user_id = Auth::id();
        $user_daily_check_questions = UserDailyCheckQuestion::where('daily_check_question_id', $daily_check_question_id)->where("user_id", $user_id)->get()->first();
        if($user_daily_check_questions){
            $user_daily_check_questions->status = $status;
            $user_daily_check_questions->save();
            return $this->success("User Check Question Updated", new UserDailyCheckQuestionResource($user_daily_check_questions));
        }
        else{
            $user_daily_check_questions = new UserDailyCheckQuestion();
            $user_daily_check_questions->daily_check_question_id = $daily_check_question_id;
            $user_daily_check_questions->status = $status;
            $user_daily_check_questions->user_id = $user_id;
            $user_daily_check_questions->save();
            return $this->success("User Check Question Added", new UserDailyCheckQuestionResource($user_daily_check_questions));
        }
    }
}
