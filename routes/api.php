<?php

use App\Http\Controllers\BooksController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/


Route::post('insert-interval', [BooksController::class, 'insertInterval'])->name('insert_interval');
Route::get('most-recommended', [BooksController::class, 'mostRecommended'])->name('most_recommended');
