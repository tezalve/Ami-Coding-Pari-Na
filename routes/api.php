<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{ AuthController, KhojController };

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

Route::middleware('auth:sanctum')->group(function (){
    Route::get('user',          [AuthController::class, 'user']);
    Route::get('logout',        [AuthController::class, 'logout']);
    Route::get('search',        [KhojController::class, 'search']);
});

Route::post('register',     [AuthController::class, 'register']);
Route::post('login',        [AuthController::class, 'login']);
Route::post('store',        [KhojController::class, 'store']);




