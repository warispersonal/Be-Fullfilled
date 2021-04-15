<?php

namespace App\Http\Controllers\api\v1;

use App\FocusDay;
use App\Http\Controllers\Controller;
use App\Http\Requests\WeeklyGoalRequest;
use App\Http\Resources\FocusDayResource;
use App\Http\Resources\WeeklyGoalsResource;
use App\WeeklyGoal;
use DateTime;
use DateTimeZone;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Date;

class WeeklyGoalsController extends Controller
{

    public function index()
    {
        $goals = Auth::user()->weeklyGoals()->get();
        return $this->success('Goals list', WeeklyGoalsResource::collection($goals));
    }

    public function create()
    {
        //
    }

    public function store(WeeklyGoalRequest $request)
    {
        $weeklyGoals = new WeeklyGoal();
        $weeklyGoals['day'] = $request['day'];
        $weeklyGoals['status'] = false;
        $weeklyGoals['goal'] = $request['goal'];

        Auth::user()->weeklyGoals()->save($weeklyGoals);
        return $this->success("Created", new WeeklyGoalsResource($weeklyGoals));
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }

    public function specificGoalsDayList($date)
    {
        $goals = WeeklyGoal::whereDate('day', '=', $date)->where('user_id',Auth::id())->get();
        $dayName = date('l', strtotime($date));
        return response()->json([
            "day" => $dayName,
            "date" => $date,
            "goals" => WeeklyGoalsResource::collection($goals),
        ]);
    }

    public function currentWeekGoalsList($date = null)
    {

        if ($date == null) {
            $today = new DateTime('now', new DateTimeZone('UTC'));
        } else {
            $today = new DateTime($date, new DateTimeZone('UTC'));
        }

        $day_of_week = $today->format('w');
        $today->modify('- ' . (($day_of_week - 1 + 7) % 7) . 'days');

        $monday = clone $today;
        $mondayGoals = WeeklyGoal::whereDate('day', '=', $monday->format('Y-m-d'))->where('user_id',Auth::id())->get();

        $tuesday = clone $today;
        $tuesday->modify('+ 1 days');
        $tuesdayGoals = WeeklyGoal::whereDate('day', '=', $tuesday->format('Y-m-d'))->where('user_id',Auth::id())->get();

        $wednesday = clone $today;
        $wednesday->modify('+ 2 days');
        $wednesdayGoals = WeeklyGoal::whereDate('day', '=', $wednesday->format('Y-m-d'))->where('user_id',Auth::id())->get();

        $thursday = clone $today;
        $thursday->modify('+ 3 days');
        $thursdayGoals = WeeklyGoal::whereDate('day', '=', $thursday->format('Y-m-d'))->where('user_id',Auth::id())->get();

        $friday = clone $today;
        $friday->modify('+ 4 days');
        $fridayGoals = WeeklyGoal::whereDate('day', '=', $friday->format('Y-m-d'))->where('user_id',Auth::id())->get();

        $saturday = clone $today;
        $saturday->modify('+ 5 days');
        $saturdayGoals = WeeklyGoal::whereDate('day', '=', $saturday->format('Y-m-d'))->where('user_id',Auth::id())->get();

        $sunday = clone $today;
        $sunday->modify('+ 6 days');
        $sundayGoals = WeeklyGoal::whereDate('day', '=', $sunday->format('Y-m-d'))->where('user_id',Auth::id())->get();

        return response()->json([[
            "day" => "Monday",
            "date" => $monday->format('Y-m-d'),
            "goals" => WeeklyGoalsResource::collection($mondayGoals),
        ], [
            "day" => "Tuesday",
            "date" => $tuesday->format('Y-m-d'),
            "goals" => WeeklyGoalsResource::collection($tuesdayGoals),
        ], [
            "day" => "Wednesday",
            "date" => $wednesday->format('Y-m-d'),
            "goals" => WeeklyGoalsResource::collection($wednesdayGoals),
        ], [
            "day" => "Thursday",
            "date" => $thursday->format('Y-m-d'),
            "goals" => WeeklyGoalsResource::collection($thursdayGoals),
        ], [
            "day" => "Friday",
            "date" => $friday->format('Y-m-d'),
            "goals" => WeeklyGoalsResource::collection($fridayGoals),
        ], [
            "day" => "Saturday",
            "date" => $saturday->format('Y-m-d'),
            "goals" => WeeklyGoalsResource::collection($saturdayGoals),
        ], [
            "day" => "Sunday",
            "date" => $sunday->format('Y-m-d'),
            "goals" => WeeklyGoalsResource::collection($sundayGoals),
        ]]);

    }

    public function updateStatus($id)
    {
        $goal = WeeklyGoal::find($id);
        if ($goal) {
            $goal->status = true;
            $goal->save();
            return $this->success("Status Updated", new WeeklyGoalsResource($goal));
        } else {
            return $this->failure('Goal not found', 404);
        }
    }

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
