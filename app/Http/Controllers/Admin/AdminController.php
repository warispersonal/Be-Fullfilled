<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index(){
        return view('admin.index');
    }

    public function add_content_to_the_library(){
        return view('admin.add_content_to_the_library');
    }

    public function add_new_faq(){
        return view('admin.add-new-faq');
    }
}
