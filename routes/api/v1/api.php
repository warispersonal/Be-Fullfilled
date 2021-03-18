<?php

use App\Http\Controllers\api\v1\LoginController;
use App\Http\Controllers\api\v1\RegisterController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/


Route::get('/login', [LoginController::class, 'unauthorized'])->name('un-authorized');
Route::prefix('/user')->group(function () {
    Route::post('/login', [LoginController::class, 'login']);
    Route::post('/register', [RegisterController::class, 'register']);
});


Route::middleware('auth:api')->group(function () {
    Route::prefix('/user')->group(function (){
        Route::get('/profile', [RegisterController::class, 'profile']);
        Route::delete('/logout', [RegisterController::class, 'logout']);
    });
});


Route::post('forgot-password', [RegisterController::class,'forgot']);
Route::post('password/reset', [RegisterController::class,'reset']);
