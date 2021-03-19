<?php

namespace App\Http\Controllers\api\v1;

use App\Http\Controllers\Controller;
use App\Journal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Validator;

class JournalsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $journals = Auth::user()->journals()->get();
        return response($journals, 200);
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
            'title_notes' => 'required |max:255',
            'notes_description' => 'required',
        ]);
        if ($validator->fails()) {
            return response(['errors' => $validator->errors()->all()], 422);
        }

        $journal = new Journal();
        $journal['title_notes'] = $request['title_notes'];
        $journal['notes_description'] = $request['notes_description'];


        Auth::user()->journals()->save($journal);
        return response(['message' => 'Created', 'data' => $journal], 200);


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
