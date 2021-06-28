<?php

use App\Http\Controllers\admin\FlipTheSwitchController;
use App\Http\Controllers\api\v1\BugReportController;
use App\Http\Controllers\api\v1\ContactUsController;
use App\Http\Controllers\api\v1\ContentLibraryController;
use App\Http\Controllers\api\v1\DailyCheckQuestionController;
use App\Http\Controllers\api\v1\DailyQuestionController;
use App\Http\Controllers\api\v1\EmailSendController;
use App\Http\Controllers\api\v1\FlipTheSwitchController as FlipSwitch;
use App\Http\Controllers\api\v1\FocusController;
use App\Http\Controllers\api\v1\IsRecordExists;
use App\Http\Controllers\api\v1\LoginController;
use App\Http\Controllers\api\v1\NotesController;
use App\Http\Controllers\api\v1\OrderController;
use App\Http\Controllers\api\v1\PodcastsController;
use App\Http\Controllers\api\v1\ProductController;
use App\Http\Controllers\api\v1\RegisterController;
use App\Http\Controllers\api\v1\ShoppingCartController;
use App\Http\Controllers\api\v1\SocialSetupController;
use App\Http\Controllers\api\v1\Twilio;
use App\Http\Controllers\api\v1\UserDailyCheckQuestionController;
use App\Http\Controllers\api\v1\WeeklyGoalsController;
use App\Http\Controllers\api\v1\YourDayController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Return un-authenticated if not login
|--------------------------------------------------------------------------
*/


Route::get('/login', [LoginController::class, 'unauthorized'])->name('un-authorized');

/*
|--------------------------------------------------------------------------
| Register & Login api's
|--------------------------------------------------------------------------
*/

Route::prefix('/user')->group(function () {
    Route::post('/login', [LoginController::class, 'login']);
    Route::post('/register', [RegisterController::class, 'register']);
});
Route::post('/social/setup', [SocialSetupController::class, 'social_setup']);

/*
|--------------------------------------------------------------------------
| Forgot password & reset password api's
|--------------------------------------------------------------------------
*/

//Route::post('forgot-password', [RegisterController::class,'forgot']);
//Route::post('password/reset', [RegisterController::class,'reset']);


Route::middleware('auth:api')->group(function () {

    /*
    |--------------------------------------------------------------------------
    | User profile & logout api's
    |--------------------------------------------------------------------------
    */

    Route::prefix('/user')->group(function () {
        Route::get('/', [RegisterController::class, 'profile']);
        Route::post('/update/profile', [RegisterController::class, 'update_profile']);
        Route::delete('/logout', [RegisterController::class, 'logout']);
    });

    /*
    |--------------------------------------------------------------------------
    | Route for Notes
    |--------------------------------------------------------------------------
    */

    Route::prefix('/notes')->group(function () {
        Route::get('/{limit?}', [NotesController::class, 'index']);
        Route::post('/create', [NotesController::class, 'store']);
        Route::delete('/{id}/delete', [NotesController::class, 'destroy']);
    });

    Route::prefix('/shopping-cart')->group(function () {
        Route::get('/{limit?}', [ShoppingCartController::class, 'index']);
        Route::post('/create', [ShoppingCartController::class, 'store']);
        Route::delete('/{id}/delete', [ShoppingCartController::class, 'destroy']);
    });

    /*
    |--------------------------------------------------------------------------
    | Route for Weekly Goals
    |--------------------------------------------------------------------------
    */

    Route::prefix('/goals')->group(function () {
        Route::get('/', [WeeklyGoalsController::class, 'index']);
        Route::post('/create', [WeeklyGoalsController::class, 'store']);
        Route::get('/date/{date}', [WeeklyGoalsController::class, 'specificGoalsDayList']);
        Route::get('/week/{date?}', [WeeklyGoalsController::class, 'currentWeekGoalsList']);
        Route::get('/{id}/status', [WeeklyGoalsController::class, 'updateStatus']);
        Route::get('/stats/{date?}', [WeeklyGoalsController::class, 'stats']);
        Route::get('/week/{start_date?}/{end_date?}', [WeeklyGoalsController::class, 'weeklyGoalListByDate']);
    });

    /*
    |--------------------------------------------------------------------------
    | Route for Daily Check Question
    |--------------------------------------------------------------------------
    */

    Route::prefix('/daily-check-question')->group(function () {
        Route::get('/', [DailyCheckQuestionController::class, 'index']);
    });


    /*
    |--------------------------------------------------------------------------
    | Route for User Daily Check Question
    |--------------------------------------------------------------------------
    */

    Route::prefix('/user-daily-check-question')->group(function () {
        Route::post('/create', [UserDailyCheckQuestionController::class, 'store']);
    });

    /*
    |--------------------------------------------------------------------------
    | Route for Focus create & get
    |--------------------------------------------------------------------------
    */

    Route::prefix('/focus')->group(function () {
        Route::post('/create', [FocusController::class, 'dayFocusScore']);
        Route::get('/{date?}', [FocusController::class, 'getDayFocusScore']);
    });

    /*
    |--------------------------------------------------------------------------
    | Route for Daily Questions
    |--------------------------------------------------------------------------
    */

    Route::prefix('/questions')->group(function () {
        Route::get('/{limit?}', [DailyQuestionController::class, 'index']);
        Route::post('/create', [DailyQuestionController::class, 'store']);
    });

    /*
    |--------------------------------------------------------------------------
    | Route for Your Day
    |--------------------------------------------------------------------------
    */
    Route::prefix('/day')->group(function () {
        Route::get('/{limit?}', [YourDayController::class, 'index']);
        Route::post('/create', [YourDayController::class, 'store']);
        Route::get('/{date?}', [YourDayController::class, 'show']);
    });


    /*
    |--------------------------------------------------------------------------
    | Route for bugreport & contact us
    |--------------------------------------------------------------------------
    */

    Route::post('/bug/report', [BugReportController::class, 'store']);
    Route::post('/contact/us', [ContactUsController::class, 'store']);


    /*
    |--------------------------------------------------------------------------
    | Route for checkout, user orders
    |--------------------------------------------------------------------------
    */
    Route::post('/checkout', [OrderController::class, 'place_order']);


    Route::prefix('/order')->group(function () {
        Route::get('/{status_id?}/{limit?}', [OrderController::class, 'index']);
    });
    Route::get('/show/order/{id}', [OrderController::class, 'show']);


});


/*
|--------------------------------------------------------------------------
| Route for Register Reset Password on Email & Mobile
|--------------------------------------------------------------------------
*/

Route::post('send/sms', [Twilio::class, 'sendConfirmationMessage']);
Route::post('reset/password/sms', [Twilio::class, 'sendResetPasswordOnMobile']);
Route::post('reset/password/email', [EmailSendController::class, 'sendResetPasswordOnEmail']);
Route::post('password/reset', [RegisterController::class, 'resetPassword']);


/*
|--------------------------------------------------------------------------
| Route for Flip the Switch & Content Library & Podcasts
|--------------------------------------------------------------------------
*/

Route::get('flip-the-switch/{limit?}', [FlipSwitch::class, 'index']);
Route::get('content-library/{limit?}', [ContentLibraryController::class, 'index']);
Route::get('podcasts/{limit?}', [PodcastsController::class, 'index']);


/*
|--------------------------------------------------------------------------
| Check if Email & Phone Number exists
|--------------------------------------------------------------------------
*/
Route::prefix('/unique')->group(function () {
    Route::get('email/{user}', [IsRecordExists::class, 'email']);
    Route::get('phone/{user}', [IsRecordExists::class, 'phone']);
});


Route::get('user/list', [RegisterController::class, 'users']);


/*
|--------------------------------------------------------------------------
| Route for Products
|--------------------------------------------------------------------------
*/
Route::prefix('/products')->group(function () {
    Route::get('/{limit?}', [ProductController::class, 'index']);
    Route::get('/{id}/details', [ProductController::class, 'show']);
});

