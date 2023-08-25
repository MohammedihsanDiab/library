<?php

use App\Http\Controllers\BookController;
use App\Http\Controllers\UserController;
use Illuminate\Auth\Events\Authenticated;
use Illuminate\Auth\Middleware\Authenticate;
use Illuminate\Contracts\Session\Middleware\AuthenticatesSessions;
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


    Route::post('/logout', [UserController::class, 'logout']);

Route::get('/search/{search?}', [BookController::class, 'show']);
Route::get('/edit/{id}', [BookController::class, 'edit']);
Route::post('/update/{id}', [BookController::class, 'update']);
Route::get('/books', [BookController::class, 'index']);
Route::post('/singlebooke/{id}', [BookController::class, 'singelindex']);
Route::post('/add',[BookController::class,'store']);
Route::delete('delete/{id}',[BookController::class,'destroy']);
Route::post('/register',[UserController::class,'register']);
Route::post('/login',[UserController::class,'login']);

