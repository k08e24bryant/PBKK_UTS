<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EventController;
use App\Http\Controllers\NoteController;

Route::get('/', function () {
    return redirect('/home');
})->name('home');

Route::get('/home', [EventController::class, 'dashboard'])->name('home');
Route::get('/calendar', function () {
    return view('calendar');
});
Route::get('/notes', function () {
    return view('notes');
});
Route::get('/events', [EventController::class, 'index']);
Route::post('/events', [EventController::class, 'store']);
Route::delete('/events/{id}', [EventController::class, 'destroy']);
Route::post('/notes', [NoteController::class, 'store'])->name('notes.store');