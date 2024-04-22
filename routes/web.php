<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
//use App\Livewire\Users\UserList;
use App\Livewire\Users\UserList;
use App\Livewire\Users\UserCreate;
use App\Livewire\Users\UserEdit;

Route::view('/', 'welcome');

// Route::view('dashboard', 'dashboard')
//     ->middleware(['auth'])
//     ->name('dashboard');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

require __DIR__.'/auth.php';



Route::controller(UserController::class)->group(function () {
    Route::post('/users', 'store');
    Route::put('/users/{user}', 'update');
    Route::delete('/users/{user}', 'delete');
    Route::get('/users/{user}', 'show');
});

Route::middleware(['middleware' => 'auth'])->group(function () {
    Route::get('dashboard', UserList::class)->name('dashboard');
    Route::prefix('view')->group(function () {
        Route::get('/users', UserList::class)->name('user.index');
        Route::get('/users/create', UserCreate::class)->name('user.create');
        Route::get('/users/edit/{user}', UserEdit::class)->name('user.edit');
    });
});




