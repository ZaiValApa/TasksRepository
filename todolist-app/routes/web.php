<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TareaController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/tarea',[TareaController::class,'index'])->name('tarea.index');
Route::get('/tarea/añadir',[TareaController::class,'create'])->name('tarea.create');
Route::post('/tarea',[TareaController::class,'store'])->name('tarea.store');
Route::get('/tarea/{tarea}/edit',[TareaController::class, 'edit'])->name('tarea.edit');
Route::put('/tarea/{tarea}/update',[TareaController::class, 'update'])->name('tarea.update');
Route::delete('/tarea/{tarea}/tarea',[TareaController::class, 'destroy'])->name('tarea.destroy');
