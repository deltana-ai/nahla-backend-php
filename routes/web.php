<?php

use App\Http\Controllers\ContactMessageController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\UserController;
use App\Http\Controllers\VipRequestController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('home');



Route::get('/pakeg', function () {
    return view('pages.pakge');
});



Route::get('/apps', function () {
    return view('pages.apps');
});




Route::get('/about', function () {
    return view('pages.about');
});




Route::get('/about', function () {
    return view('pages.about');
});

Route::get('/massage', function () {
    return view('pages.contact');
});


Route::get('/vip', function () {
    return view('pages.vip');
});



Route::resource('vip', VipRequestController::class);
Route::resource('contact', ContactMessageController::class);

Route::get('/create-user', [UserController::class, 'showForm'])->name('register.form');
Route::post('/register', [UserController::class, 'store'])->name('register.store');

Route::get('/login-user', [UserController::class, 'showLoginForm'])->name('login.form');
Route::post('/login', [UserController::class, 'login'])->name('login.submit');
Route::post('/logout', [UserController::class, 'logout'])->name('logout');




Route::middleware('auth')->get('/profile', function () {
    return view('auth.profile');
})->name('profile');
