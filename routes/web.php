<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

Route::get('/', function () {
    return view('welcome');
});

Route::controller(UserController::class)->group(function () {
    Route::post('/users', 'store');
    Route::put('/users/{user}', 'update');
    Route::delete('/users/{user}', 'delete');
});
