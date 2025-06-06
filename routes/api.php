ini route api.php nya
<?php

use App\Http\Controllers\AuthorController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\GenreController;
use App\Http\Controllers\TransactionController;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

// Auth Routes
// Route::post('/register', [AuthController::class, 'register']);
// Route::post('/login', [AuthController::class, 'login']);
// Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth:api');

// Route::apiResource('/books', BookController::class)->only('index', 'show');

// Route::middleware(['auth:api'])->group(function () {
//     // Book Route
//     Route::apiResource('/books', BookController::class);
//     // Genre Routes
//     Route::apiResource('/genres', GenreController::class);
//     // Author Routes
//     Route::apiResource('/authors', AuthorController::class);
// });

// Route::middleware(['role:admin'])->group(function () {
//         // Book Routes
//         Route::apiResource('/books', BookController::class)->only(['store', 'update', 'destroy']);
//     });

// akses umum
Route::post('/register', [\App\Http\Controllers\AuthController::class, 'register']);
Route::post('/login', [\App\Http\Controllers\AuthController::class, 'login']);
Route::post('/logout', [\App\Http\Controllers\AuthController::class, 'logout'])->middleware('auth:api');
Route::apiResource('books', BookController::class)->only(['index', 'show']);
Route::apiResource('genres', GenreController::class)->only(['index', 'show']);
Route::apiResource('authors', AuthorController::class)->only(['index', 'show']);

Route::middleware('auth:api')->group(function () {
    Route::apiResource('books', BookController::class)->only(['index', 'store', 'show']);
    Route::apiResource('genres', GenreController::class)->only(['index', 'store', 'show']);
    Route::apiResource('authors', AuthorController::class)->only(['index', 'store', 'show']);
    Route::apiResource('/transactions', TransactionController::class)->only(['index', 'store', 'show']);
    });

    Route::middleware('role:admin')->group(function () {
        Route::apiResource('books', BookController::class)->only(['store', 'update', 'destroy']);
        Route::apiResource('genres', GenreController::class)->only(['store', 'update', 'destroy']);
        Route::apiResource('authors', AuthorController::class)->only(['store', 'update', 'destroy']);
        Route::apiResource('/transactions', TransactionController::class)->only(['store', 'update', 'destroy']);
    });