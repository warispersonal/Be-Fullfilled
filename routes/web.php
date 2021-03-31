<?php

use App\Http\Controllers\admin\AdminController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


Auth::routes();

Route::prefix('/admin')->group(function (){
    Route::get('/',[AdminController::class, 'index']);
    Route::get('/add-content-to-the-library',[AdminController::class, 'add_content_to_the_library']);
});
