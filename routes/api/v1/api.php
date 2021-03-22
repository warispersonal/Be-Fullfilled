<?php

use App\Http\Controllers\api\v1\JournalsController;
use App\Http\Controllers\api\v1\LoginController;
use App\Http\Controllers\api\v1\NotesController;
use App\Http\Controllers\api\v1\RegisterController;

use App\Http\Controllers\api\v1\WeeklyGoalsController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Return un-authenticated if not login
|--------------------------------------------------------------------------
*/


Route::get('/login', [LoginController::class, 'unauthorized'])->name('un-authorized');

/*
|--------------------------------------------------------------------------
| Register & Login API's
|--------------------------------------------------------------------------
*/

Route::prefix('/user')->group(function () {
    Route::post('/login', [LoginController::class, 'login']);
    Route::post('/register', [RegisterController::class, 'register']);
});

/*
|--------------------------------------------------------------------------
| Forgot password & reset password API's
|--------------------------------------------------------------------------
*/

Route::post('forgot-password', [RegisterController::class,'forgot']);
Route::post('password/reset', [RegisterController::class,'reset']);


Route::middleware('auth:api')->group(function () {

    /*
    |--------------------------------------------------------------------------
    | User profile & logout API's
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
    });
});



