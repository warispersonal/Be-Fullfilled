<?php

namespace App\Http\Controllers\api\v1;

use App\Http\Controllers\Controller;
use App\Http\Requests\WeeklyGoalRequest;
use App\Http\Resources\WeeklyGoalsResource;
use App\WeeklyGoal;
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
        return $this->success('Goals list' , WeeklyGoalsResource::collection($goals));

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
     * @param  \Illuminate\Http\Request  $request
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
