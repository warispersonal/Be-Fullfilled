<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\GenericController;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('admin.index', compact('users'));
    }


    public function all_orders()
    {
        return view('admin.all-orders');
    }

    public function podcast()
    {
        return view('admin.podcast');
    }


    public function upload_new_podcast()
    {
        return view('admin.upload-new-podcast');
    }

    public function user_profile_detail()
    {
        return view('admin.user-profile-detail');
    }

    public function finance_dashboard()
    {
        return view('admin.finance-dashboard');
    }

    public function my_profile_setting()
    {
        return view('admin.my-profile-setting');
    }

    public function new_password()
    {
        return view('admin.new-password');
    }

    public function reset_password()
    {
        return view('admin.reset-password');
    }

    public function reset_password_email()
    {
        return view('admin.reset-password-email');
    }


    public function terms_and_condition()
    {
        return view('admin.terms-and-condition');
    }

    public function feedback()
    {
        return view('admin.feedback');
    }

    public function via_email(Request $request)
    {

    }

    public function via_cell_number(Request $request)
    {

    }

    public function update_profile(Request $request)
    {
        $auth = Auth::user();

        if ($request->file) {
            $auth->profile = GenericController::saveImageSameModel($request, 'file', env('ADMIN_IMAGES'));
        }
        $auth->name = $request->name;
        $auth->email = $request->email;
        $auth->phone_number = $request->phone_number;
        $auth->city = $request->city;
        $auth->zipcode = $request->zipcode;
        $auth->street_address = $request->street_address;
        if ($request->password) {
            $auth->password = bcrypt('password');
        }

        $auth->save();
        return redirect()->route('my_profile_setting')->with('success_message', 'Profile successfully updated.');
    }
}
