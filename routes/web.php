<?php

use App\Http\Controllers\admin\AdminController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


Auth::routes();

Route::prefix('/admin')->group(function (){
    Route::get('/',[AdminController::class, 'index']);
});
