<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use Inertia\Inertia;

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/search', [HomeController::class, 'search'])->name('search');

// Keep the welcome route for testing
Route::get('/welcome', function () {
    return Inertia::render('welcome');
})->name('welcome');
