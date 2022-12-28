<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BasketController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [HomeController::class, 'main']);
Route::get('/product/{slug}', [ProductController::class, 'singlePage']);

// login view router
Route::get('/login', [AuthController::class, 'login']);
Route::get('/register', [AuthController::class, 'register']);

// Login post methods
Route::post('/login', [AuthController::class, 'check'])->name('login');
Route::post('/register', [AuthController::class, 'store']);

// user page methods
Route::get('/user/main', [UserController::class, 'main'])->name('user_main')->middleware('auth');
Route::post('/logout', function(){

    Auth::logout();
 
    request()->session()->invalidate();
 
    request()->session()->regenerateToken();
 
    return redirect('/');
});

Route::post('/changeUserInfo', [UserController::class, 'changeUserInfo']);


// basket methods
Route::post('/addToBasket', [BasketController::class, 'addToBasket']);
Route::get('/basket', [BasketController::class, 'main']);
Route::get('/buyProducts', [BasketController::class, 'finish']);