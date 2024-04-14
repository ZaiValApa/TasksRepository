<?php

use App\Models\Tarea;
use Illuminate\Foundation\Auth\User;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\TareaController;

/*Route::get('/', function () {
    $tareas = Tarea::where('user_id', auth()->id())->get();
    $user = User::where('id', auth()->id())->get();
    return view('users.index', ['tareas' => $tareas], ['user' => $user]);
});
*/
Route::post('/logout', [UserController::class, 'logout'])->name('user.logout');
Route::post('/login', [UserController::class, 'login'])->name('user.login');
Route::post('/users', [UserController::class, 'store'])->name('user.store');
Route::post('/register', [UserController::class, 'create'])->name('user.create');

Route::get('/', [UserController::class, 'index'])->name('users.index');

Route::middleware(['auth'])->group(function () {
    Route::resource('tarea', TareaController::class)->except('show');
});

/*
Route::get('/tarea',[TareaController::class,'index'])->name('tarea.index');
Route::get('/tarea/añadir',[TareaController::class,'create'])->name('tarea.create');
Route::post('/tarea',[TareaController::class,'store'])->name('tarea.store');
Route::get('/tarea/{tarea}/edit',[TareaController::class, 'edit'])->name('tarea.edit');
Route::put('/tarea/{tarea}/update',[TareaController::class, 'update'])->name('tarea.update');
Route::delete('/tarea/{tarea}/tarea',[TareaController::class, 'destroy'])->name('tarea.destroy');
*/
