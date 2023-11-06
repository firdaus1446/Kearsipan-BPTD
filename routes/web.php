<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ArsipController;
use App\Http\Controllers\BerandaController;
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
    return view('Login');
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
Route::get('/edituser/{id}', [AdminController::class,'edit'])->name('edituser');
Route::post('/updateuser/{id}', [AdminController::class,'update'])->name('updateuser');
Route::get('/deleteuser/{id}', [AdminController::class,'destroy'])->name('deleteuser');

// Data Arsip
Route::get('/dataarsip', [ArsipController::class,'index'])->name('dataarsip');
Route::get('/createarsip', [ArsipController::class,'create'])->name('createarsip');
Route::post('/simpanarsip', [ArsipController::class,'store'])->name('simpanarsip');
Route::get('/editarsip/{id}', [ArsipController::class,'edit'])->name('editarsip');
Route::post('/updatearsip/{id}', [ArsipController::class,'update'])->name('updatearsip');
Route::get('/deletearsip/{id}', [ArsipController::class,'destroy'])->name('deletearsip');

// Dashboard
Route::get('/beranda', [BerandaController::class,'index'])->name('beranda');
