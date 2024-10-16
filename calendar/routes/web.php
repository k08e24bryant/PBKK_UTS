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
Route::get('/notes', [NoteController::class, 'index'])->name('notes.index');
Route::post('/notes', [NoteController::class, 'store'])->name('notes.store');
Route::get('/notes/{id}/edit', [NoteController::class, 'edit'])->name('notes.edit');
Route::put('/notes/{id}', [NoteController::class, 'update'])->name('notes.update');
Route::delete('/notes/{id}', [NoteController::class, 'destroy'])->name('notes.destroy');

// Route Event
Route::get('/events', [EventController::class, 'index']);
Route::post('/events', [EventController::class, 'store']);
Route::delete('/events/{id}', [EventController::class, 'destroy']);
