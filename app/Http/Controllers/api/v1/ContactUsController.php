<?php

namespace App\Http\Controllers\api\v1;

use App\Admin;
use App\ContactUs;
use App\Mail\ContactUs as ContactUsEmail;
use App\Http\Controllers\Controller;
use App\Http\Requests\ContactUsRequest;
use App\Http\Resources\ContactUsResource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class ContactUsController extends Controller
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
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'subject' => 'required',
            'message' => 'required'
        ]);
        if ($validator->fails()) {
            $error = $validator->errors()->first();
            return $this->validationFailure($error);
        } else {
            $contactUs = new ContactUs();
            $contactUs->subject = $request->subject;
            $contactUs->message = $request->message;
            $contactUs->user_id = Auth::id();
            $contactUs->save();

            $admin = Admin::first();
            Mail::to($admin->email)->send(new ContactUsEmail(Auth::user(), $contactUs));
            return $this->success("Request Send", new ContactUsResource($contactUs));
        }
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
