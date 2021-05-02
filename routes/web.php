<?php

use App\Http\Controllers\MovieController;
use Illuminate\Support\Facades\Route;

require __DIR__.'/auth.php';

Route::get('/', function () {
    return view('welcome');
});

Route::resource('movies', MovieController::class);
