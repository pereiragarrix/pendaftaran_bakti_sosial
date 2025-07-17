<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ParticipantController;

Route::get('/', function () {
    return view('welcome');
});

Route::resource('participants', ParticipantController::class);

// Tampilkan form tambah peserta
Route::get('/participants/create', [ParticipantController::class, 'create'])->name('participants.create');

// Simpan data peserta baru
Route::post('/participants', [ParticipantController::class, 'store'])->name('participants.store');
