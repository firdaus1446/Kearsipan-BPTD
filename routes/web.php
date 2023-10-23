<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ArsipController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;

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

Route::get('/login', function () {
    return view('Login');
});

Route::get('/beranda', function () {
    return view('beranda');
});

// Login & Registrasi
Route::post('/postlogin', [LoginController::class,'postlogin'])->name('postlogin');
// ->middleware('isBeranda');
Route::get('/logout', [LoginController::class,'logout'])->name('logout');
// Route::get('/registrasi', [LoginController::class,'registrasi'])->name('registrasi')->middleware('isBeranda');
// Route::post('/simpanregistrasi', [LoginController::class,'simpanregistrasi'])->name('simpanregistrasi');

// Data user
Route::get('/datauser', [AdminController::class,'index'])->name('datauser');
Route::get('/createuser', [AdminController::class,'create'])->name('createuser');
Route::post('/simpanuser', [AdminController::class,'store'])->name('simpanuser');

// Data Arsip
Route::get('/dataarsip', [ArsipController::class,'index'])->name('dataarsip');