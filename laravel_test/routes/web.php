<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

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

Route::get('/user', [UserController::class, 'index']);
Route::get('/user/login', [UserController::class, 'login']);
Route::post('/user/login_action', [UserController::class, 'login_action']);
Route::get('/user/edit', [UserController::class, 'edit']);
Route::post('/user/edit_action', [UserController::class, 'edit_action']);
Route::get('/user/logout', [UserController::class, 'logout']);