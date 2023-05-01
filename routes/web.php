<?php

use App\Http\Controllers\BookController;
use App\Http\Controllers\AuthorController;
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
Route::get('/books/{book}',[BookController::class, 'show']);
Route::get('/book/{book}/edit',[BookController::class, 'edit']);
Route::get('/books/create',[BookController::class, 'create']);
Route::post('/books',[BookController::class, 'store']);
Route::patch('/books/{book}', [BookController::class, 'update']);
Route::delete('/books/{book}', [BookController::class, 'destroy']);
// </editor-folder>

// <editor-folder desc="Start Route Authors">
Route::get('/authors', [AuthorController::class, 'index']);
// </editor-folder>
