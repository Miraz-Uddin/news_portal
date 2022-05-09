<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CheckAgeController;

Route::get('/', function () {
    return view('welcome');
});
 
Route::get('/content', [CheckAgeController::class, 'index'])->middleware('check');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
