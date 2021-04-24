<?php

namespace App\Http\Controllers\api\v1;

use App\BugReport;
use App\Http\Controllers\Controller;
use App\Http\Controllers\GenericController;
use App\Http\Requests\BugReportRequest;
use App\Http\Resources\BugReportResource;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Auth;

class BugReportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
    public function store(BugReportRequest $request)
    {
        $media = GenericController::saveMediaFile($request,'link', env('BUG_REPORT_IMAGE'));
        $bugReport = new BugReport();
        $bugReport->description = $request->description;
        $bugReport->media_id = $media->id ?? null;
        $bugReport->user_id = Auth::id();
        $bugReport->save();
        return $this->success("Bug Reported", new BugReportResource($bugReport));

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
