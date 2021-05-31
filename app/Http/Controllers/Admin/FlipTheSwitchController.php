<?php

namespace App\Http\Controllers\Admin;

use App\FlipTheSwitch;
use App\Http\Controllers\Controller;
use App\Http\Controllers\GenericController;
use App\Http\Requests\FlipTheSwitchRequest;
use Carbon\Carbon;
use Illuminate\Http\Request;

class FlipTheSwitchController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $flipTheSwitches = FlipTheSwitch::all();
        return view('admin.flip_the_switch.index', compact('flipTheSwitches'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.flip_the_switch.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(FlipTheSwitchRequest $request)
    {
        $image = GenericController::saveImage($request, 'file', env('FLIP_THE_SWITCH_IMAGES'));
        $media = GenericController::saveMediaFile($request,'link', env('FLIP_THE_SWITCH_MEDIA'));
        $flipTheSwitch = new FlipTheSwitch();
        $flipTheSwitch->title = $request->title;
        $flipTheSwitch->date = $this->changeDateFormat($request->date);
        $flipTheSwitch->image_id = $image->id ?? null;
        $flipTheSwitch->media_id = $media->id ?? null;

        $flipTheSwitch->save();
        return redirect()->route('flip_the_switch')->with('success_message', 'Flip the switch successfully created.');
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
}
