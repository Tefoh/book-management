<?php

use App\Http\Controllers\v1\Admin\AdminAuthorController;
use App\Http\Controllers\v1\Admin\AdminBookController;
use App\Http\Controllers\v1\Auth\LoginController;
use App\Http\Controllers\v1\Auth\RegisterController;
use App\Http\Controllers\v1\Book\BookController;
use App\Http\Controllers\v1\Book\ReserveController;
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

Route::middleware('guest')->post('/register', RegisterController::class);
Route::middleware('guest')->get('/login', fn () => 'You are not logged in.')->name('login');
Route::middleware('guest')->post('/login', LoginController::class);

Route::prefix('books')->group(function () {
    Route::get('all', [BookController::class, 'allBooks']);
    Route::get('get/{id}', [BookController::class, 'getBook']);

    Route::middleware('auth')->group(function () {
        Route::post('/reserve/{id}', [ReserveController::class, 'reserve']);
        Route::post('/release/{id}', [ReserveController::class, 'release']);
    });
});
Route::prefix('/admin')->group(function () {
    Route::resource('books', AdminBookController::class);
    Route::resource('authors', AdminAuthorController::class);
});
