<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
//use App\Livewire\Users\UserList;
use App\Livewire\UserList;
use App\Livewire\UserCreate;
use App\Livewire\UserEdit;

Route::view('/', 'welcome');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

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


Route::get('/view/users', UserList::class)->name('user.index');
Route::get('/view/users/create', UserCreate::class)->name('user.create');
Route::get('/view/users/edit/{user}', UserEdit::class)->name('user.edit');