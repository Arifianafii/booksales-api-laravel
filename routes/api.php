<?php

use App\Http\Controllers\AuthorController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\GenreController;
use App\Http\Controllers\HomeController;
use Illuminate\Http\Request;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// Home Route (assuming this is a web route, otherwise it might be in web.php)
// If this is purely an API, you might not need a 'home' route like this.
Route::get('/', [HomeController::class, 'index'])->name('home');

// Book Routes - Using apiResource for RESTful API endpoints
Route::apiResource('/books', BookController::class);

// Genre Routes - Using apiResource for RESTful API endpoints
Route::apiResource('/genres', GenreController::class);

// Author Routes - Using apiResource for RESTful API endpoints
Route::apiResource('/authors', AuthorController::class);
