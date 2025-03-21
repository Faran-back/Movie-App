<?php

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Home\HomeController;
use App\Http\Controllers\Movies\MovieController;
use App\Http\Controllers\TvShows\TvShowController;

Route::get('/', function () {
    return view('welcome');
});


Route::get('/home', [HomeController::class, 'index'])->name('dashboard');

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

Route::get('all-movies', [MovieController::class, 'index'])->name('movies');
Route::get('/new-movie', [MovieController::class, 'create'])->name('create.movie');
Route::post('/new-movie', [MovieController::class, 'store'])->name('store.movie');
Route::get('/edit-movie/{id}', [MovieController::class, 'edit'])->name('edit.movie');
Route::put('/update-movie/{id}', [MovieController::class, 'update'])->name('update.movie');
Route::delete('/delete-movie/{id}', [MovieController::class, 'destroy'])->name('destroy.movie');

/**
 *
    *** TV SHOWS ROUTES ***
 *
 */

Route::get('/tv-shows', [TvShowController::class, 'index'])->name('tv.shows');
Route::get('/new-tvshow', [TvShowController::class, 'create'])->name('create.tvshow');
Route::post('/new-tvshow', [TvShowController::class, 'store'])->name('store.tvshow');
Route::get('/edit-tvshow/{id}', [TvShowController::class, 'edit'])->name('edit.tvshow');
Route::put('/update-tvshow/{id}', [TvShowController::class, 'update'])->name('update.tvshow');
Route::put('/delete-tvshow/{id}', [TvShowController::class, 'destroy'])->name('destroy.tvshow');




require __DIR__.'/auth.php';
