<?php

namespace App\Http\Controllers\api\v1;

use App\FocusDay;
use App\Http\Controllers\Controller;
use App\Http\Resources\FocusDayResource;
use App\ScoreCard;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Facades\Validator;

class FocusController extends Controller
{

    public function dayFocusScore(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'focus_value' => 'required|numeric',
            'score_card_id' => 'required|numeric',
        ]);
        $score_card_id = $request->score_card_id;
        $score_card = ScoreCard::find($score_card_id);
        if ($validator->fails()) {
            $error = $validator->errors()->first();
            return $this->validationFailure($error);
        } else {
            if($score_card){
                $focus = FocusDay::where('user_id', Auth::id())->where('score_card_id',$score_card_id)->where('date', Date::now()->format('Y-m-d'))->first();
                if ($focus) {
                    $focus->focus_value = $request->focus_value;
                    $focus->save();
                    return $this->success("Day Focus Updates", new FocusDayResource($focus));
                } else {
                    $focusDay = new FocusDay();
                    $focusDay->user_id = Auth::id();
                    $focusDay->date = Date::now()->format('Y-m-d');
                    $focusDay->focus_value = $request->focus_value;
                    $focusDay->score_card_id = $request->score_card_id;
                    $focusDay->save();
                    return $this->success("Day Focus Created", new FocusDayResource($focusDay));
                }
            }
            else{
                return $this->failure('Invalid score card id', 404);

            }
        }

    }

    public function getDayFocusScore($date = null)
    {
        if ($date == null) {
            $focus = FocusDay::where('date', Date::now()->format('Y-m-d'))->where('user_id', Auth::id())->first();
        } else {
            $focus = FocusDay::where('date', $date)->first();
        }
        if ($focus) {
            return $this->success("Day Focus", new FocusDayResource($focus));
        } else {
            return $this->failure('Focus not found', 404);
        }
    }
}
