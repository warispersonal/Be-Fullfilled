<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin.index');
    }

    public function add_content_to_the_library()
    {
        return view('admin.add_content_to_the_library');
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

    public function content_library(){
        return view('admin.content-library');
    }
}
