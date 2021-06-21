<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\ContentLibraryController;
use App\Http\Controllers\Admin\FlipTheSwitchController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\PodcastController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\PushNotificationController;
use App\Http\Controllers\Admin\QuestionController;
use App\Http\Controllers\api\v1\LoginController;
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

        Route::prefix('/flip-the-switch')->group(function () {
            Route::get('/', [FlipTheSwitchController::class, 'index'])->name('flip_the_switch');
            Route::get('/new', [FlipTheSwitchController::class, 'create'])->name('upload_new');
            Route::post('/new', [FlipTheSwitchController::class, 'store'])->name('upload_new_post');
            Route::get('{id}/edit', [FlipTheSwitchController::class, 'edit'])->name('edit_flip_the_switch');
            Route::post('{id}/edit', [FlipTheSwitchController::class, 'update'])->name('update_flip_the_switch');
            Route::get('{id}/destroy', [FlipTheSwitchController::class, 'destroy'])->name('destroy_flip_the_switch');
        });


        Route::prefix('/content-library')->group(function () {
            Route::get('/', [ContentLibraryController::class, 'index'])->name('content_library');
            Route::get('/add', [ContentLibraryController::class, 'create'])->name('add_content_to_the_library');
            Route::post('/add', [ContentLibraryController::class, 'store'])->name('add_content_to_the_library_post');
            Route::get('{id}/edit', [ContentLibraryController::class, 'edit'])->name('edit_content_library');
            Route::post('{id}/edit', [ContentLibraryController::class, 'update'])->name('update_content_library');
            Route::get('{id}/destroy', [ContentLibraryController::class, 'destroy'])->name('destroy_content_library');
        });


        Route::prefix('/podcast')->group(function () {
            Route::get('/', [PodcastController::class, 'index'])->name('podcast');
            Route::get('/add', [PodcastController::class, 'create'])->name('upload_new_podcast');
            Route::post('/add', [PodcastController::class, 'store'])->name('upload_new_podcast_post');
            Route::get('{id}/edit', [PodcastController::class, 'edit'])->name('edit_podcast');
            Route::post('{id}/edit', [PodcastController::class, 'update'])->name('update_podcast');
            Route::get('{id}/destroy', [PodcastController::class, 'destroy'])->name('destroy_podcast');
        });


        Route::prefix('/manage-store')->group(function () {
            Route::get('/', [ProductController::class, 'index'])->name('manage_store');
            Route::get('/add', [ProductController::class, 'create'])->name('store_add_product');
            Route::post('/add', [ProductController::class, 'store'])->name('store_add_product_post');
            Route::get('{id}/edit', [ProductController::class, 'edit'])->name('edit_manage_store');
            Route::post('{id}/edit', [ProductController::class, 'update'])->name('update_manage_store');
            Route::get('{id}/destroy', [ProductController::class, 'destroy'])->name('destroy_manage_store');
        });


        Route::get('/faq', [QuestionController::class, 'index'])->name('faq');
        Route::get('/add-new-faq', [QuestionController::class, 'create'])->name('add_new_faq');
        Route::post('/add-new-faq', [QuestionController::class, 'store'])->name('add_new_faq_post');

        Route::get('/users', [AdminController::class, 'index'])->name('admin');
        Route::get('/all-orders', [OrderController::class, 'index'])->name('all_orders');

        Route::get('/user-profile-detail/{id?}', [AdminController::class, 'user_profile_detail'])->name('user_profile_detail');

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


Route::post('/web/login', [LoginController::class, 'login']);
