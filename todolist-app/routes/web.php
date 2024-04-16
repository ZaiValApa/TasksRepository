<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\TareaController;

// View
Route::get('register', [AuthController::class, 'registerView'])->name('register');
Route::get('login', [AuthController::class, 'loginView'])->name('login');

// Endpoints
Route::post('register', [AuthController::class, 'register'])->name('auth.register');
Route::post('login', [AuthController::class, 'login'])->name('auth.login');

// Protected endpoints
Route::middleware(['auth'])->group(function () {
    Route::post('logout', [AuthController::class, 'logout'])->name('auth.logout');

    // Tasks
    Route::resource('tareas', TareaController::class)->except('show');
});
