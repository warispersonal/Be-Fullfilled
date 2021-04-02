<?php

use App\Http\Controllers\admin\AdminController;
use App\Http\Controllers\admin\ContentLibraryController;
use App\Http\Controllers\admin\FlipTheSwitchController;
use Illuminate\Support\Facades\Route;

Route::redirect('/', 'login');

Auth::routes();
Route::prefix('/admin')->group(function () {

    Route::get('/upload-new', [FlipTheSwitchController::class, 'create'])->name('upload_new');
    Route::post('/upload-new', [FlipTheSwitchController::class, 'store'])->name('upload_new_post');
    Route::get('/flip-the-switch', [FlipTheSwitchController::class, 'index'])->name('flip_the_switch');


    Route::get('/content-library', [AdminController::class, 'index'])->name('content_library');
    Route::get('/add-content-to-the-library', [AdminController::class, 'add_content_to_the_library'])->name('add_content_to_the_library');


    Route::get('/', [AdminController::class, 'index'])->name('admin');
    Route::get('/add-new-faq', [AdminController::class, 'add_new_faq'])->name('add_new_faq');
    Route::get('/all-orders', [AdminController::class, 'all_orders'])->name('all_orders');
    Route::get('/faq', [AdminController::class, 'faq'])->name('faq');
    Route::get('/manage-store', [AdminController::class, 'manage_store'])->name('manage_store');
    Route::get('/podcast', [AdminController::class, 'podcast'])->name('podcast');
    Route::get('/store-add-product', [AdminController::class, 'store_add_product'])->name('store_add_product');
    Route::get('/upload-new-podcast', [AdminController::class, 'upload_new_podcast'])->name('upload_new_podcast');
    Route::get('/user-profile-detail', [AdminController::class, 'user_profile_detail'])->name('user_profile_detail');
});
