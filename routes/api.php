<?php

use App\Http\Controllers\v1\Admin\AdminAuthorController;
use App\Http\Controllers\v1\Admin\AdminBookController;
use App\Http\Controllers\v1\Auth\LoginController;
use App\Http\Controllers\v1\Auth\RegisterController;
use App\Http\Controllers\v1\Book\BookController;
use App\Http\Controllers\v1\Book\ReserveController;
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

Route::middleware('guest')->post('/register', RegisterController::class);
Route::middleware('guest')->post('/login', LoginController::class);

Route::prefix('books')->group(function () {
    Route::get('all', [BookController::class, 'allBooks']);
    Route::get('get/{id}', [BookController::class, 'getBook']);

    Route::middleware('auth:sanctum')->group(function () {
        Route::post('/reserve/{id}', [ReserveController::class, 'reserve']);
        Route::post('/release/{id}', [ReserveController::class, 'release']);
    });
});
Route::middleware('auth:sanctum')->prefix('/admin')->group(function () {
    Route::apiResource('books', AdminBookController::class);
    Route::apiResource('authors', AdminAuthorController::class);
});
