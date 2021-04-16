<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin.index');
    }

    public function add_new_faq()
    {
        return view('admin.add-new-faq');
    }

    public function all_orders()
    {
        return view('admin.all-orders');
    }

    public function faq(){
        return view('admin.faq');
    }

    public function manage_store(){
        return view('admin.manage-store');
    }

    public function podcast(){
        return view('admin.podcast');
    }

    public function store_add_product(){
        return view('admin.store-add-product');
    }

    public function upload_new_podcast(){
        return view('admin.upload-new-podcast');
    }

    public function user_profile_detail(){
        return view('admin.user-profile-detail');
    }

    public function finance_dashboard(){
        return view('admin.finance-dashboard');
    }

    public function my_profile_setting(){
        return view('admin.my-profile-setting');
    }

    public function new_password(){
        return view('admin.new-password');
    }

    public function notification(){
        return view('admin.notification');
    }

    public function reset_password(){
        return view('admin.reset-password');
    }

    public function reset_password_email(){
        return view('admin.reset-password-email');
    }

    public function send_push_notification(){
        return view('admin.send-push-notification');
    }

    public function terms_and_condition(){
        return view('admin.terms-and-condition');
    }

    public function feedback(){
        return view('admin.feedback');
    }


}
