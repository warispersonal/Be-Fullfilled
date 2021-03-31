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
    Route::get('/add-new-faq',[AdminController::class, 'add_new_faq']);
    Route::get('/all-orders',[AdminController::class, 'all_orders']);
    Route::get('/content-library',[AdminController::class, 'content_library']);
    Route::get('/faq',[AdminController::class, 'faq']);
    Route::get('/flip-the-switch',[AdminController::class, 'flip_the_switch']);
    Route::get('/manage-store',[AdminController::class, 'manage_store']);
    Route::get('/podcast',[AdminController::class, 'podcast']);
    Route::get('/store-add-product',[AdminController::class, 'store_add_product']);
    Route::get('/upload-new',[AdminController::class, 'upload_new']);
    Route::get('/upload-new-podcast',[AdminController::class, 'upload_new_podcast']);
    Route::get('/user-profile-detail',[AdminController::class, 'user_profile_detail']);
});
