<?php

use Illuminate\Support\Facades\Route;
use Naykel\Navpa\Http\Controllers\PageController;

// add web middleware to give access to error, csrf... ect
Route::middleware(['web'])->group(function () {
    Route::resource('pages', PageController::class);
});

