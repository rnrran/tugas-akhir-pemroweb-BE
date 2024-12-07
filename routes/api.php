<?php

use App\Http\Controllers\BlogController;
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


Route::get('users', [UserController::class, 'index']);
Route::get('users/{id}', [UserController::class, 'show']);

Route::get('blogs', [BlogController::class, 'index']); 
Route::get('blogs/{id}', [BlogController::class, 'show']); 
Route::post('blogs', [BlogController::class, 'store']); 
Route::get('blogs/{id}/edit', [BlogController::class, 'edit']); 
Route::put('blogs/{id}', [BlogController::class, 'update']); 
Route::delete('blogs/{id}', [BlogController::class, 'destroy']); 
Route::post('comments', [CommentController::class, 'store']);