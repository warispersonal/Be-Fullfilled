<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\ContentLibraryController;
use App\Http\Controllers\Admin\FlipTheSwitchController;
use App\Http\Controllers\Admin\PodcastController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\PushNotificationController;
use App\Http\Controllers\Admin\QuestionController;
use Illuminate\Support\Facades\Route;

Route::redirect('/', 'login');

Auth::routes();
Route::post('login', [
    'as' => '',
    'uses' => 'Auth\LoginController@adminLogin'
]);
Route::middleware('auth:admin')->group(function () {
    Route::prefix('/admin')->group(function () {


        Route::post('/update-profile', [AdminController::class, 'update_profile'])->name('update_profile');

        Route::get('/flip-the-switch', [FlipTheSwitchController::class, 'index'])->name('flip_the_switch');
        Route::get('/upload-new', [FlipTheSwitchController::class, 'create'])->name('upload_new');
        Route::post('/upload-new', [FlipTheSwitchController::class, 'store'])->name('upload_new_post');

        Route::get('/content-library', [ContentLibraryController::class, 'index'])->name('content_library');
        Route::get('/add-content-to-the-library', [ContentLibraryController::class, 'create'])->name('add_content_to_the_library');
        Route::post('/add-content-to-the-library', [ContentLibraryController::class, 'store'])->name('add_content_to_the_library_post');

        Route::get('/podcast', [PodcastController::class, 'index'])->name('podcast');
        Route::get('/upload-new-podcast', [PodcastController::class, 'create'])->name('upload_new_podcast');
        Route::post('/upload-new-podcast', [PodcastController::class, 'store'])->name('upload_new_podcast_post');

        Route::get('/manage-store', [ProductController::class, 'index'])->name('manage_store');
        Route::get('/store-add-product', [ProductController::class, 'create'])->name('store_add_product');
        Route::post('/store-add-product', [ProductController::class, 'store'])->name('store_add_product_post');

        Route::get('/faq', [QuestionController::class, 'index'])->name('faq');
        Route::get('/add-new-faq', [QuestionController::class, 'create'])->name('add_new_faq');
        Route::post('/add-new-faq', [QuestionController::class, 'store'])->name('add_new_faq_post');

        Route::get('/', [AdminController::class, 'index'])->name('admin');
        Route::get('/all-orders', [AdminController::class, 'all_orders'])->name('all_orders');

        Route::get('/user-profile-detail', [AdminController::class, 'user_profile_detail'])->name('user_profile_detail');

        Route::get('/finance-dashboard', [AdminController::class, 'finance_dashboard'])->name('finance_dashboard');
        Route::get('/my-profile-setting', [AdminController::class, 'my_profile_setting'])->name('my_profile_setting');

        Route::get('/terms-and-condition', [AdminController::class, 'terms_and_condition'])->name('terms_and_condition');
        Route::get('/feedback', [AdminController::class, 'feedback'])->name('feedback');

        Route::get('/notification', [PushNotificationController::class, 'index'])->name('notification');
        Route::get('/send-push-notification', [PushNotificationController::class, 'create'])->name('send_push_notification');
        Route::post('/send-push-notification', [PushNotificationController::class, 'store'])->name('send_push_notification_post');

    });
});

Route::get('/reset-password', [AdminController::class, 'reset_password'])->name('reset_password');
Route::post('/reset-password/via-email', [AdminController::class, 'via_email'])->name('via_email');
Route::post('/reset-password/via-cell-number', [AdminController::class, 'via_cell_number'])->name('via_cell_number');



Route::get('/new-password', [AdminController::class, 'new_password'])->name('new_password');
Route::get('/reset-password-email', [AdminController::class, 'reset_password_email'])->name('reset_password_email');
