<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Movies\MovieController;
use App\Http\Controllers\TvShows\TvShowController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', function () {
    return view('home');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

/**
 *
    *** MOVIES ROUTES ***
 *
 */

Route::get('/movies', [MovieController::class, 'index'])->name('movies');
Route::get('/create', [MovieController::class, 'create'])->name('create.movie');
Route::post('/store', [MovieController::class, 'store'])->name('store.movie');
Route::get('/edit/{id}', [MovieController::class, 'edit'])->name('edit.movie');
Route::get('/update/{id}', [MovieController::class, 'update'])->name('update.movie');

/**
 *
    *** TV SHOWS ROUTES ***
 *
 */

Route::get('tv-shows', [TvShowController::class, 'index'])->name('tv.shows');




require __DIR__.'/auth.php';
