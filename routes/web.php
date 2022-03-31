<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;

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

Route::get('/', [BookController::class, 'index'])->name('home');
Route::post('/add', [BookController::class, 'create'])->name('create');
Route::get('/book', [BookController::class, 'show'])->name('show');
Route::delete('/book/{id}', [BookController::class, 'destroy'])->name('destroy');
Route::get('/download/{id}', [BookController::class, 'download'])->name('download');
