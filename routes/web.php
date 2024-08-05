<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TavoloController; 
use App\Http\Controllers\OrdineController;
use App\Http\Controllers\PiattoController;
Route::get('/', function () {
    return view('welcome');
});

Route::resource('tavoli', TavoloController::class);
Route::resource('ordini', OrdineController::class);
Route::resource('piatti', PiattoController::class);

