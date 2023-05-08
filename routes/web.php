<?php

use App\Http\Controllers\BookController;
use App\Http\Controllers\AuthorController;
use App\Http\Controllers\PublisherController;
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

Route::get('/', fn()=> view('welcome'));

// <editor-folder desc="Start Route Books">
Route::resource('books', BookController::class);
// </editor-folder>

// <editor-folder desc="Start Route Authors">
Route::resource('authors', AuthorController::class);
// </editor-folder>

// <editor-folder desc="Start Route Authors">
Route::resource('publishers', PublisherController::class);
// </editor-folder>

