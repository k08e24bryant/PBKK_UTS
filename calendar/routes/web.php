<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EventController;

Route::get('/', function () {
    return view('welcome');
});


Route::get('/events', [EventController::class, 'index']);


Route::post('/events', [EventController::class, 'store']);


Route::delete('/events/{id}', [EventController::class, 'destroy']);
