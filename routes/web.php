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

Route::get('/', function () {
    return view('welcome');
});

// <editor-folder desc="Start Route Books">
Route::get('/books', [BookController::class, 'index']);
// </editor-folder>

// <editor-folder desc="Start Route Authors">
Route::get('/authors', [AuthorController::class, 'index']);
// </editor-folder>

// <editor-folder desc="Start Route Authors">
Route::get('/publishers', [PublisherController::class, 'index']);
// </editor-folder>
