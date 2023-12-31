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
})->middleware('isBeranda');

Route::get('/login', function () {
    return view('Login');
})->middleware('isBeranda');

Route::get('/lupapass', [LoginController::class,'lupapass'])->name('lupapass')->middleware('isBeranda');

Route::get('/beranda', function () {
    return view('beranda');
})->middleware('isLogin');

// Login & Registrasi
Route::post('/postlogin', [LoginController::class,'postlogin'])->name('postlogin');
// ->middleware('isBeranda');
Route::get('/logout', [LoginController::class,'logout'])->name('logout');
// Route::get('/registrasi', [LoginController::class,'registrasi'])->name('registrasi')->middleware('isBeranda');
// Route::post('/simpanregistrasi', [LoginController::class,'simpanregistrasi'])->name('simpanregistrasi');

// Data user
Route::get('/datauser', [AdminController::class,'index'])->name('datauser')->middleware('isLogin');
Route::get('/createuser', [AdminController::class,'create'])->name('createuser')->middleware('isLogin');
Route::post('/simpanuser', [AdminController::class,'store'])->name('simpanuser');
Route::get('/edituser/{id}', [AdminController::class,'edit'])->name('edituser')->middleware('isLogin');
Route::post('/updateuser/{id}', [AdminController::class,'update'])->name('updateuser');
Route::get('/deleteuser/{id}', [AdminController::class,'destroy'])->name('deleteuser')->middleware('isLogin');
Route::get('/searchuser', [AdminController::class,'searchUser'])->name('searchuser')->middleware('isLogin');
Route::get('/profil', [AdminController::class,'profil'])->name('profil')->middleware('isLogin');
Route::get('/editprofil/{id}', [AdminController::class,'editprofil'])->name('editprofil')->middleware('isLogin');
Route::post('/updateprofil/{id}', [AdminController::class,'updateprofil'])->name('updateprofil');

// Data Arsip
Route::get('/dataarsip', [ArsipController::class,'index'])->name('dataarsip')->middleware('isLogin');
Route::get('/createarsip', [ArsipController::class,'create'])->name('createarsip')->middleware('isLogin');
Route::post('/simpanarsip', [ArsipController::class,'store'])->name('simpanarsip');
Route::get('/editarsip/{id}', [ArsipController::class,'edit'])->name('editarsip')->middleware('isLogin');
Route::post('/updatearsip/{id}', [ArsipController::class,'update'])->name('updatearsip');
Route::get('/deletearsip/{id}', [ArsipController::class,'destroy'])->name('deletearsip')->middleware('isLogin');
Route::get('/exportarsip', [ArsipController::class,'exportarsip'])->name('exportarsip')->middleware('isLogin');
Route::get('/searcharsip', [ArsipController::class,'searchArsip'])->name('searcharsip')->middleware('isLogin');
Route::get('/download/{file}', [ArsipController::class, 'download'])->name('download')->middleware('isLogin');


// Dashboard
Route::get('/beranda', [BerandaController::class,'index'])->name('beranda')->middleware('isLogin');
