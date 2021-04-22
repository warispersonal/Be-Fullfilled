<?php

use App\Http\Controllers\admin\FlipTheSwitchController;
use App\Http\Controllers\api\v1\ContentLibraryController;
use App\Http\Controllers\api\v1\DailyQuestionController;
use App\Http\Controllers\api\v1\EmailSendController;
use App\Http\Controllers\api\v1\FlipTheSwitchController as FlipSwitch;
use App\Http\Controllers\api\v1\FocusController;
use App\Http\Controllers\api\v1\IsRecordExists;
use App\Http\Controllers\api\v1\LoginController;
use App\Http\Controllers\api\v1\NotesController;
use App\Http\Controllers\api\v1\PodcastsController;
use App\Http\Controllers\api\v1\RegisterController;
use App\Http\Controllers\api\v1\Twilio;
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

    Route::prefix('/user')->group(function (){
        Route::get('/', [RegisterController::class, 'profile']);
        Route::delete('/logout', [RegisterController::class, 'logout']);
    });


    /*
    |--------------------------------------------------------------------------
    | Route for Notes
    |--------------------------------------------------------------------------
    */

    Route::prefix('/notes')->group(function (){
        Route::get('/', [NotesController::class, 'index']);
        Route::post('/create', [NotesController::class, 'store']);
    });

    /*
    |--------------------------------------------------------------------------
    | Route for Weekly Goals
    |--------------------------------------------------------------------------
    */

    Route::prefix('/goals')->group(function (){
        Route::get('/', [WeeklyGoalsController::class, 'index']);
        Route::post('/create', [WeeklyGoalsController::class, 'store']);
        Route::get('/date/{date}', [WeeklyGoalsController::class, 'specificGoalsDayList']);
        Route::get('/week/{date?}', [WeeklyGoalsController::class, 'currentWeekGoalsList']);
        Route::get('/{id}/status', [WeeklyGoalsController::class, 'updateStatus']);
    });


    Route::prefix('/focus')->group(function (){
        Route::post('/create', [FocusController::class, 'dayFocusScore']);
        Route::get('/{date?}', [FocusController::class, 'getDayFocusScore']);
    });


    /*
    |--------------------------------------------------------------------------
    | Route for Daily Questions
    |--------------------------------------------------------------------------
    */

    Route::prefix('/questions')->group(function (){
        Route::get('/', [DailyQuestionController::class, 'index']);
        Route::post('/create', [DailyQuestionController::class, 'store']);
    });


    /*
    |--------------------------------------------------------------------------
    | Route for Your Day
    |--------------------------------------------------------------------------
    */

    Route::prefix('/day')->group(function (){
        Route::get('/', [YourDayController::class, 'index']);
        Route::post('/create', [YourDayController::class, 'store']);
    });
});


/*
|--------------------------------------------------------------------------
| Route for Register Reset Password on Email & Mobile
|--------------------------------------------------------------------------
*/

Route::post('send/sms', [Twilio::class, 'sendConfirmationMessage']);
Route::post('reset/password/sms', [Twilio::class, 'sendResetPasswordOnMobile']);
Route::post('reset/password/email', [EmailSendController::class, 'sendResetPasswordOnEmail']);
Route::post('password/reset', [RegisterController::class,'resetPassword']);


/*
|--------------------------------------------------------------------------
| Route for Flip the Switch & Content Library & Podcasts
|--------------------------------------------------------------------------
*/

Route::get('flip-the-switch', [FlipSwitch::class, 'index']);
Route::get('content-library', [ContentLibraryController::class, 'index']);
Route::get('podcasts', [PodcastsController::class, 'index']);



/*
|--------------------------------------------------------------------------
| Check if Email & Phone Number exists
|--------------------------------------------------------------------------
*/
Route::prefix('/unique')->group(function (){
    Route::get('email/{user}', [IsRecordExists::class, 'email']);
    Route::get('phone/{user}', [IsRecordExists::class, 'phone']);
});



Route::get('user/list', [RegisterController::class, 'users']);
