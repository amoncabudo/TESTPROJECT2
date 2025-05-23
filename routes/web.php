<?php

use App\Http\Controllers\AnuncisController;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', function () {
    return Inertia::render('Welcome');
})->name('home');

Route::get('dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::resource('anuncis', \App\Http\Controllers\AnuncisController::class);

require __DIR__.'/settings.php';
require __DIR__.'/auth.php';
