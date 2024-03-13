<?php

use App\Http\Controllers\Admin\AdminController;
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

Route::get('/posts', [bookController::class,'index'])->name('index');

Route::group(['prefix' => 'admin'],function () {
    Route::resource('posts',AdminController::class);
});