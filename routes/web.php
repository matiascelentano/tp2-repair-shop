<?php

use App\Http\Controllers\RepairController;
use App\Http\Controllers\AuthController; 
use Illuminate\Support\Facades\Route;

Route::get('/', fn() => redirect()->route('repairs.index'));
Route::get('/login', [AuthController::class, 'showLogin'])->name('login')->middleware('guest');
Route::post('/login', [AuthController::class, 'login'])->middleware('guest');

Route::middleware('auth')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
    Route::resource('repairs', RepairController::class);
    Route::get('repairs/{repair}/audits', [RepairController::class, 'audits'])->name('repairs.audits');
});