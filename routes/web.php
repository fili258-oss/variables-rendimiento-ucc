<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;

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
Auth::routes();

Route::get('/', function () {
    return view('welcome');
});

//Route::view("/","layouts.dashboard.app");
//Route::view("login","layouts.auth.login");


Route::get('/escritorio', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/a', function () {
    return view('welcome');
});
Route::view("home","home");