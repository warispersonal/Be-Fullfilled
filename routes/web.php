<?php

use App\Http\Controllers\admin\AdminController;
use App\Http\Controllers\admin\ContentLibraryController;
use App\Http\Controllers\admin\FlipTheSwitchController;
use App\Http\Controllers\admin\PodcastController;
use Illuminate\Support\Facades\Route;

Route::redirect('/', 'login');

Auth::routes();
Route::post('login', [
    'as' => '',
    'uses' => 'Auth\LoginController@adminLogin'
]);
Route::middleware('auth:admin')->group(function () {
    Route::prefix('/admin')->group(function () {

        Route::get('/flip-the-switch', [FlipTheSwitchController::class, 'index'])->name('flip_the_switch');
        Route::get('/upload-new', [FlipTheSwitchController::class, 'create'])->name('upload_new');
        Route::post('/upload-new', [FlipTheSwitchController::class, 'store'])->name('upload_new_post');

        Route::get('/content-library', [ContentLibraryController::class, 'index'])->name('content_library');
        Route::get('/add-content-to-the-library', [ContentLibraryController::class, 'create'])->name('add_content_to_the_library');
        Route::post('/add-content-to-the-library', [ContentLibraryController::class, 'store'])->name('add_content_to_the_library_post');

        Route::get('/podcast', [PodcastController::class, 'index'])->name('podcast');
        Route::get('/upload-new-podcast', [PodcastController::class, 'create'])->name('upload_new_podcast');
        Route::post('/upload-new-podcast', [PodcastController::class, 'store'])->name('upload_new_podcast_post');


        Route::get('/', [AdminController::class, 'index'])->name('admin');
        Route::get('/add-new-faq', [AdminController::class, 'add_new_faq'])->name('add_new_faq');
        Route::get('/all-orders', [AdminController::class, 'all_orders'])->name('all_orders');
        Route::get('/faq', [AdminController::class, 'faq'])->name('faq');
        Route::get('/manage-store', [AdminController::class, 'manage_store'])->name('manage_store');

        Route::get('/store-add-product', [AdminController::class, 'store_add_product'])->name('store_add_product');
        Route::get('/user-profile-detail', [AdminController::class, 'user_profile_detail'])->name('user_profile_detail');

        Route::get('/finance-dashboard', [AdminController::class, 'finance_dashboard'])->name('finance_dashboard');
        Route::get('/my-profile-setting', [AdminController::class, 'my_profile_setting'])->name('my_profile_setting');
        Route::get('/new-password', [AdminController::class, 'new_password'])->name('new_password');
        Route::get('/notification', [AdminController::class, 'notification'])->name('notification');
        Route::get('/reset-password', [AdminController::class, 'reset_password'])->name('reset_password');
        Route::get('/reset-password-email', [AdminController::class, 'reset_password_email'])->name('reset_password_email');
        Route::get('/send-push-notification', [AdminController::class, 'send_push_notification'])->name('send_push_notification');
        Route::get('/terms-and-condition', [AdminController::class, 'terms_and_condition'])->name('terms_and_condition');
        Route::get('/feedback', [AdminController::class, 'feedback'])->name('feedback');
    });
});
