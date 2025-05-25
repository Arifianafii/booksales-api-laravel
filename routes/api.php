<?php

use App\Http\Controllers\AuthorController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\GenreController;
use App\Http\Controllers\HomeController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');



// Home Route
Route::get('/', [HomeController::class, 'index'])->name('home');

Route::apiResource('/books', BookController::class);


// Genre Routes
Route::apiResource('/genres', GenreController::class);

// Author Routes
Route::apiResource('/authors', AuthorController::class);