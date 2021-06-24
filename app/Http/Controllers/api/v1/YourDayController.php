<?php

namespace App\Http\Controllers\api\v1;

use App\Http\Controllers\Controller;
use App\Http\Requests\YourDayRequest;
use App\Http\Resources\YourDayCollection;
use App\Http\Resources\YourDayResource;
use App\YourDay;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class YourDayController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($limit = 10)
    {
        $yourDays = Auth::user()->yourDays()->paginate($limit);
        return $this->success("Your days list", new YourDayCollection($yourDays));
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'daily_question_id' => 'required|exists:daily_questions,id',
            'answer' => 'required',
            'day' => 'required',
        ]);
        if ($validator->fails()) {
            $error = $validator->errors()->first();
            return $this->validationFailure($error);
        } else {
            $yourDay = new YourDay();
            $yourDay['daily_question_id'] = $request['daily_question_id'];
            $yourDay['answer'] = $request['answer'];
            $yourDay['day'] = $request['day'];
            Auth::user()->yourDays()->save($yourDay);
            return $this->success('Created', new YourDayResource($yourDay));
        }

    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($date)
    {
        $yourDays = YourDay::whereDate('day', '=', $date)->where('user_id', Auth::id())->get();
        return $this->success("Your days list", YourDayResource::collection($yourDays));
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
}
