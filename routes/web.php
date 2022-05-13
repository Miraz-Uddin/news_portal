<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CheckAgeController;
use App\Http\Controllers\Admin\JokeController;
use App\Http\Controllers\Admin\BlogController;
use App\Http\Controllers\Admin\UserController;

Route::get('/', function () {
    return view('welcome');
});
 
Route::get('/content', [CheckAgeController::class, 'index'])->middleware('check');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () { return view('dashboard'); })->name('dashboard');
    Route::get('/users', [UserController::class, 'index'])->name('users.index');
    Route::get('/jokes', [JokeController::class, 'index'])->name('jokes.index');
    Route::post('/jokes', [JokeController::class, 'store'])->name('jokes.store');
    Route::get('/blogs', [BlogController::class, 'index'])->name('blogs.index');
});
