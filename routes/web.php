<?php

use App\Http\Controllers\MovieController;
use Illuminate\Support\Facades\Route;

require __DIR__.'/auth.php';

Route::get('/', function () {
    return view('welcome');
});

Route::resource('movies', MovieController::class);
Route::put('movies/{movie}/removePoster', [MovieController::class, 'removePoster'])
    ->name('movies.removePoster');
Route::put('movies/{movie}/removeSubtitles', [MovieController::class, 'removeSubtitles'])
    ->name('movies.removeSubtitles');
