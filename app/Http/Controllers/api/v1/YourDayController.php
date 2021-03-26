<?php

namespace App\Http\Controllers\api\v1;

use App\Http\Controllers\Controller;
use App\Http\Requests\YourDayRequest;
use App\Http\Resources\YourDayResource;
use App\YourDay;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class YourDayController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $yourDays = Auth::user()->yourDays()->get();
        return $this->success("Your days list",YourDayResource::collection($yourDays));
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(YourDayRequest $request)
    {
        $yourDay = new YourDay();
        $yourDay['daily_question_id'] = $request['daily_question_id'];
        $yourDay['answer'] = $request['answer'];
        Auth::user()->yourDays()->save($yourDay);
        return $this->success('Created',new YourDayResource($yourDay));

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
