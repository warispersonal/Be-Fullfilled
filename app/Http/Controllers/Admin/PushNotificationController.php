<?php

namespace App\Http\Controllers\Admin;

use App\Constant\FileConstant;
use App\Http\Controllers\Controller;
use App\Http\Controllers\GenericController;
use App\Http\Requests\PushNotificationRequest;
use App\PushNotification;
use App\User;
use Illuminate\Http\Request;

class PushNotificationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pushNotifications = PushNotification::all();
        return view('admin.push_notification.index', compact('pushNotifications'));
    }

    public function fcm()
    {
        return view('welcome');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.push_notification.create');
    }

    public function sendWebNotification()
    {
        $from = "AAAALKnDRGA:APA91bE-_5FRb2FANhP__JLgNtmngxO9ski8FLFMZ12Dx1XxkI4ZxbHlI-6nee7U3ZueMjXpboz_ggS-alkiPJdoL40LGM0tmT-TfpbUkrdGWqEmFnOEts3pSoS9gWLUHKcYEyu8fslp";
        $token = "cPgNTArxpr4Os-c0wVxuxs:APA91bFeK4IgBKCS9Uj9y-d37F2BW7HMEs_NmYqLA-OSkPSXnceFSfpUpGML8WDgCE1eE6yr1DlUTlx7e3QK6sFzpR8GukIFJV6RyDJi2DJdDEXb3KxCaCXOoXN0rakhG8qqquMGNKmZ";
        $msg = array
        (
            'body'  => "Testing Testing",
            'title' => "Hi, From Raj",
            'receiver' => 'erw',
            'icon'  => "https://image.flaticon.com/icons/png/512/270/270014.png",/*Default Icon*/
            'sound' => 'mySound'/*Default sound*/
        );

        $fields = array
        (
            'to'        => $token,
            'notification'  => $msg
        );

        $headers = array
        (
            'Authorization: key=' . $from,
            'Content-Type: application/json'
        );
        //#Send Reponse To FireBase Server
        $ch = curl_init();
        curl_setopt( $ch,CURLOPT_URL, 'https://fcm.googleapis.com/fcm/send' );
        curl_setopt( $ch,CURLOPT_POST, true );
        curl_setopt( $ch,CURLOPT_HTTPHEADER, $headers );
        curl_setopt( $ch,CURLOPT_RETURNTRANSFER, true );
        curl_setopt( $ch,CURLOPT_SSL_VERIFYPEER, false );
        curl_setopt( $ch,CURLOPT_POSTFIELDS, json_encode( $fields ) );
        $result = curl_exec($ch );
        dd($result);
        curl_close( $ch );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(PushNotificationRequest $request)
    {
        $image = GenericController::saveImage($request, 'file', FileConstant::PUSH_NOTIFICATION_IMAGES);

        $pushNotification = new PushNotification();
        $pushNotification->title = $request->title;
        $pushNotification->description = $request->description;
        $pushNotification->date = $request->date;
        $pushNotification->image_id = $image->id ?? null;
        $pushNotification->save();

        return redirect()->route('notification')->with('success_message', 'Content library successfully created.');
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
