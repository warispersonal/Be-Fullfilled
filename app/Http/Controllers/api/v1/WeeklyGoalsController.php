<?php

namespace App\Http\Controllers\api\v1;

use App\Http\Controllers\Controller;
use App\Http\Requests\WeeklyGoalRequest;
use App\Http\Resources\WeeklyGoalsResource;
use App\WeeklyGoal;
use DateTime;
use DateTimeZone;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WeeklyGoalsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $goals = Auth::user()->weeklyGoals()->get();
        return $this->success('Goals list', WeeklyGoalsResource::collection($goals));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(WeeklyGoalRequest $request)
    {
        $weeklyGoals = new WeeklyGoal();
        $weeklyGoals['day'] = $request['day'];
        $weeklyGoals['goal'] = $request['goal'];

        Auth::user()->weeklyGoals()->save($weeklyGoals);
        return $this->success("Created", new WeeklyGoalsResource($weeklyGoals));
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function specificGoalsDayList($date)
    {
        $goals = WeeklyGoal::whereDate('day', '=', $date)->get();
        $dayName = date('l', strtotime($date));
        return response()->json([
            "day" => $dayName,
            "goals" => WeeklyGoalsResource::collection($goals),
        ]);
    }

    public function currentWeekGoalsList()
    {

        $today = new DateTime('now', new DateTimeZone('UTC'));
        $day_of_week = $today->format('w');
        $today->modify('- ' . (($day_of_week - 1 + 7) % 7) . 'days');

        $monday = clone $today;
        $mondayGoals = WeeklyGoal::whereDate('day', '=', $monday->format('Y-m-d'))->get();

        $tuesday = clone $today;
        $tuesday->modify('+ 1 days');
        $tuesdayGoals = WeeklyGoal::whereDate('day', '=', $tuesday->format('Y-m-d'))->get();

        $wednesday = clone $today;
        $wednesday->modify('+ 2 days');
        $wednesdayGoals = WeeklyGoal::whereDate('day', '=', $wednesday->format('Y-m-d'))->get();

        $thursday = clone $today;
        $thursday->modify('+ 3 days');
        $thursdayGoals = WeeklyGoal::whereDate('day', '=', $thursday->format('Y-m-d'))->get();

        $friday = clone $today;
        $friday->modify('+ 4 days');
        $fridayGoals = WeeklyGoal::whereDate('day', '=', $friday->format('Y-m-d'))->get();

        $saturday = clone $today;
        $saturday->modify('+ 5 days');
        $saturdayGoals = WeeklyGoal::whereDate('day', '=', $saturday->format('Y-m-d'))->get();

        $sunday = clone $today;
        $sunday->modify('+ 6 days');
        $sundayGoals = WeeklyGoal::whereDate('day', '=', $sunday->format('Y-m-d'))->get();

        return response()->json([[
            "day" => "Monday",
            "goals" => WeeklyGoalsResource::collection($mondayGoals),
        ], [
            "day" => "Tuesday",
            "goals" => WeeklyGoalsResource::collection($tuesdayGoals),
        ], [
            "day" => "Wednesday",
            "goals" => WeeklyGoalsResource::collection($wednesdayGoals),
        ], [
            "day" => "Thursday",
            "goals" => WeeklyGoalsResource::collection($thursdayGoals),
        ], [
            "day" => "Friday",
            "goals" => WeeklyGoalsResource::collection($fridayGoals),
        ], [
            "day" => "Saturday",
            "goals" => WeeklyGoalsResource::collection($saturdayGoals),
        ], [
            "day" => "Sunday",
            "goals" => WeeklyGoalsResource::collection($sundayGoals),
        ]]);


    }
}
