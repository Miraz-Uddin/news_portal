<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CheckAgeController;

Route::get('/', function () {
    return view('welcome');
});
 
Route::get('/content', [CheckAgeController::class, 'index'])->middleware('check');
