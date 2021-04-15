<?php

namespace App\Http\Controllers\api\v1;

use App\FocusDay;
use App\Http\Controllers\Controller;
use App\Http\Resources\FocusDayResource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Date;

class FocusController extends Controller
{

    public function dayFocusScore(Request $request)
    {
        $focus = FocusDay::where('user_id', Auth::id())->where('date', Date::now()->format('Y-m-d'))->first();
        if ($focus) {
            $focus->focus_value = $request->focus_value;
            $focus->save();
            return $this->success("Day Focus Updates", new FocusDayResource($focus));
        } else {
            $focusDay = new FocusDay();
            $focusDay->user_id = Auth::id();
            $focusDay->date = Date::now()->format('Y-m-d');
            $focusDay->focus_value = $request->focus_value;
            $focusDay->save();
            return $this->success("Day Focus Created", new FocusDayResource($focusDay));
        }

    }

    public function getDayFocusScore($date = null)
    {
        if ($date == null) {
            $focus = FocusDay::where('date', Date::now()->format('Y-m-d'))->where('user_id',Auth::id())->first();
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
