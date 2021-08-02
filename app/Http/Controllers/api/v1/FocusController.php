<?php

namespace App\Http\Controllers\api\v1;

use App\FocusDay;
use App\Http\Controllers\Controller;
use App\Http\Resources\FocusDayResource;
use App\Http\Resources\UserScoreCardFilterResource;
use App\Http\Resources\UserScoreCardResource;
use App\ScoreCard;
use App\WeeklyGoal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Facades\DB;
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
            if ($score_card) {
                $focus = FocusDay::where('user_id', Auth::id())->where('score_card_id', $score_card_id)->where('date', Date::now()->format('Y-m-d'))->first();
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
            } else {
                return $this->failure('Invalid score card id', 404);
            }
        }
    }

    public function getDayFocusScore($date = null)
    {
        if ($date == null) {
            $focus = FocusDay::where('date', Date::now()->format('Y-m-d'))->where('user_id', Auth::id())->get();
        } else {
            $focus = FocusDay::where('date', $date)->get();
        }
        if ($focus) {
            return $this->success("Day Focus", FocusDayResource::collection($focus));
        } else {
            return $this->failure('Focus not found', 404);
        }
    }

    public function dashboard(Request $request)
    {

        $score_cards = DB::table('score_cards')
            ->select('score_cards.id', 'score_cards.title', 'score_cards.color', DB::raw('SUM(focus_days.focus_value) as sum'), DB::raw('COUNT(focus_days.focus_value) as count'))
            ->join('focus_days', 'score_cards.id', '=', 'focus_days.score_card_id')
            ->where('user_id', Auth::id())
            ->whereDate('focus_days.date', '>=', $request->daily_activity_start)->whereDate('focus_days.date', '<=', $request->daily_activity_start)
            ->groupBy('score_cards.id')
            ->get();

        $score_card_collection = UserScoreCardFilterResource::collection($score_cards);

        $weeklyTotalGoal = WeeklyGoal::where('user_id', Auth::id())->whereDate('day', '>=', $request->goals_start)->whereDate('day', '<=', $request->goals_end)->count('id');
        $weeklyUnCompleteGoal = WeeklyGoal::where('user_id', Auth::id())->whereDate('day', '>=', $request->goals_start)->whereDate('day', '<=', $request->goals_end)->where("status", 0)->count('id');
        $weeklyCompleteGoal = WeeklyGoal::where('user_id', Auth::id())->whereDate('day', '>=', $request->goals_start)->whereDate('day', '<=', $request->goals_end)->where("status", 1)->count('id');

        $custom = array();
        $custom['daily_activity'] = $score_card_collection;
        $custom['goals_accomplished']['total'] = $weeklyTotalGoal;
        $custom['goals_accomplished']['un-complete'] = $weeklyUnCompleteGoal;
        $custom['goals_accomplished']['complete'] = $weeklyCompleteGoal;

        return $this->success("Dashboard Score Card", $custom);
    }
}
