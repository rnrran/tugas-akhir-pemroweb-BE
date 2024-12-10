<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/', function () {
    $data = [
        "nama" => "budi",
        "nim" => "d12345",
        "kelas" => "B"
    ];
    return $data;
});

Route::post('login', [AuthController::class, 'login']);
Route::post('register', [AuthController::class, 'register']);

// update currentuser
Route::middleware('auth:sanctum')->put('user', [UserController::class, 'update']);

Route::middleware('auth:sanctum')->group(function () {
    Route::post('logout', [AuthController::class, 'logout']);


    Route::get('users', [UserController::class, 'index'])->middleware('role:admin'); 
    Route::get('users/{id}', [UserController::class, 'show'])->middleware('role:admin|self'); 

    // // CRUD Blog
    // GET /blogs → BlogController@index
    // POST /blogs → BlogController@store
    // GET /blogs/{id} → BlogController@show
    // PUT /blogs/{id} → BlogController@update
    // DELETE /blogs/{id} → BlogController@destroy
    Route::apiResource('blogs', BlogController::class)->except('show', 'index');

    Route::post('comments', [CommentController::class, 'store']); 
    Route::get('/current-user', function (Request $request) {
        return response()->json($request->user());
    });
});

Route::get('blogs', [BlogController::class, 'index']); 
Route::get('blogs/{id}', [BlogController::class, 'show']); 

// cek current user
Route::get('categories', [CategoryController::class, 'index']);
