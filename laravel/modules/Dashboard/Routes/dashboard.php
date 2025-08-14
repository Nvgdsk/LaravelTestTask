<?php

use Modules\Dashboard\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;

Route::get('/dashboard/{token}', [DashboardController::class, 'showDashboard']);