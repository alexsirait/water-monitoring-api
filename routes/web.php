<?php
use App\Http\Controllers\LoginController;
use App\Http\Controllers\SentimentController;
use Illuminate\Support\Facades\Route;
Route::get('/auth', [LoginController::class, 'auth'])->name('auth');
Route::get('/register', [LoginController::class, 'register'])->name('register');
Route::get('/phInsert/{id}', [LoginController::class, 'phInsert'])->name('phInsert');
Route::get('/formulir', [LoginController::class, 'formulir'])->name('formulir');
Route::get('/riwayat', [LoginController::class, 'riwayat'])->name('riwayat');
Route::get('/riwayatOne', [LoginController::class, 'riwayatOne'])->name('riwayatOne');
Route::get('/tambahData', [LoginController::class, 'tambahData'])->name('tambahData');
Route::get('/editData', [LoginController::class, 'editData'])->name('editData');
Route::get('/data', [LoginController::class, 'data'])->name('data');
Route::get('/detail', [LoginController::class, 'detail'])->name('detail');



Route::get('/sentiment', [SentimentController::class, 'sentiment'])->name('sentiment');



