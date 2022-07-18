<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CustomAuthController;
use App\Http\Controllers\EventController;
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
Route::get('home', [HomeController::class, 'home']);
Route::get('/', [HomeController::class, 'home']); 
Route::get('login', [CustomAuthController::class, 'index'])->name('login')->middleware('guest');
Route::post('custom-login', [CustomAuthController::class, 'customLogin'])->name('login.custom'); 
Route::get('registration', [CustomAuthController::class, 'registration'])->name('register-user')->middleware('guest');
Route::post('custom-registration', [CustomAuthController::class, 'customRegistration'])->name('register.custom'); 
Route::get('signout', [CustomAuthController::class, 'signOut'])->name('signout');
Route::get('event', [EventController::class, 'index'])->name('event');
Route::post('addevent', [EventController::class, 'store'])->name('addevent');
// Route::get('/', function () {
//     return view('welcome');
// });
