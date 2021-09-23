<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('register_view',     [AuthController::class, 'register_view'])->name('register_view');
Route::get('login_view',        [AuthController::class, 'login_view'])->name('login_view');
Route::get('user_view',         [AuthController::class, 'user_view'])->name('user_view');


