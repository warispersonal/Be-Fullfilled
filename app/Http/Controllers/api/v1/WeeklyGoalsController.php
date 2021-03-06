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
use Illuminate\Support\Facades\Validator;

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

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'goal' => 'required',
            'day' => 'required',
        ]);
        if ($validator->fails()) {
            $error = $validator->errors()->first();
            return $this->validationFailure($error);
        } else {
            $weeklyGoals = new WeeklyGoal();
            $weeklyGoals['day'] = $request['day'];
            $weeklyGoals['status'] = false;
            $weeklyGoals['goal'] = $request['goal'];

            Auth::user()->weeklyGoals()->save($weeklyGoals);
            return $this->success("Created", new WeeklyGoalsResource($weeklyGoals));
        }
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
        $goals = WeeklyGoal::whereDate('day', '=', $date)->where('user_id', Auth::id())->get();
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
        $mondayGoals = WeeklyGoal::whereDate('day', '=', $monday->format('Y-m-d'))->where('user_id', Auth::id())->get();

        $tuesday = clone $today;
        $tuesday->modify('+ 1 days');
        $tuesdayGoals = WeeklyGoal::whereDate('day', '=', $tuesday->format('Y-m-d'))->where('user_id', Auth::id())->get();

        $wednesday = clone $today;
        $wednesday->modify('+ 2 days');
        $wednesdayGoals = WeeklyGoal::whereDate('day', '=', $wednesday->format('Y-m-d'))->where('user_id', Auth::id())->get();

        $thursday = clone $today;
        $thursday->modify('+ 3 days');
        $thursdayGoals = WeeklyGoal::whereDate('day', '=', $thursday->format('Y-m-d'))->where('user_id', Auth::id())->get();

        $friday = clone $today;
        $friday->modify('+ 4 days');
        $fridayGoals = WeeklyGoal::whereDate('day', '=', $friday->format('Y-m-d'))->where('user_id', Auth::id())->get();

        $saturday = clone $today;
        $saturday->modify('+ 5 days');
        $saturdayGoals = WeeklyGoal::whereDate('day', '=', $saturday->format('Y-m-d'))->where('user_id', Auth::id())->get();

        $sunday = clone $today;
        $sunday->modify('+ 6 days');
        $sundayGoals = WeeklyGoal::whereDate('day', '=', $sunday->format('Y-m-d'))->where('user_id', Auth::id())->get();

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

    public function stats($date = null)
    {
        if ($date == null) {
            $completedGoals = WeeklyGoal::where('day', Date::now()->format('Y-m-d'))->where('user_id', Auth::id())->where('status', 1)->count();
            $allGoals = WeeklyGoal::where('day', Date::now()->format('Y-m-d'))->where('user_id', Auth::id())->count();
        } else {
            $completedGoals = WeeklyGoal::where('day', $date)->where('status', 1)->count();
            $allGoals = WeeklyGoal::where('day', $date)->count();
        }
        if($allGoals == 0){
            return $this->success("Percentage of Tasks", 0);
        }
        else{
            $percentage = ($completedGoals / $allGoals) * 100;
            $percentage = number_format($percentage, 2);
            return $this->success("Percentage of Tasks", $percentage);
        }
    }

    public function weeklyGoalListByDate($start_date = null,$end_date = null){
        if ($start_date != null && $end_date != null) {
            $start_date = new DateTime($start_date, new DateTimeZone('UTC'));
            $end_date = new DateTime($end_date, new DateTimeZone('UTC'));
        }else{
            $start_date = new DateTime('now', new DateTimeZone('UTC'));
            $end_date = new DateTime('now', new DateTimeZone('UTC'));
        }

        $Goals = WeeklyGoal::whereBetween('day', [$start_date,$end_date])->where('user_id', Auth::id())->get();
        return response()->json([
            "goals" => WeeklyGoalsResource::collection($Goals),
        ]);

    }

}
