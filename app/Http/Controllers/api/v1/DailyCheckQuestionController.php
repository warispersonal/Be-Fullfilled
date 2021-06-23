<?php

namespace App\Http\Controllers\api\v1;

use App\DailyCheckQuestion;
use App\Http\Controllers\Controller;
use App\Http\Resources\DailyCheckQuestionResource;
use Illuminate\Http\Request;

class DailyCheckQuestionController extends Controller
{
    public function index(){
        $daily_question_list = DailyCheckQuestion::all();
        return $this->success('Daily check question list ', DailyCheckQuestionResource::collection($daily_question_list));
    }
}
