<?php

use Modules\User\Http\Controllers\RegisterController;
use Illuminate\Support\Facades\Route;

Route::middleware(['api'])->group(function () {
    Route::post('/register', [RegisterController::class, 'register']);
});

Route::get('/register', [RegisterController::class, 'showForm']);