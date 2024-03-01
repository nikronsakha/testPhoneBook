<?php

use App\Http\Controllers\web\bookController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [bookController::class,'index'])->name('index');
Route::get('/posts/create', [bookController::class,'create'])->name('create');
Route::post('/posts/', [bookController::class,'store'])->name('store');
Route::get('/posts/{id}/edit', [bookController::class,'edit'])->name('edit');
Route::patch('/posts/{id}', [bookController::class,'update'])->name('update');
Route::delete('/posts/{id}', [bookController::class,'destroy'])->name('destroy');