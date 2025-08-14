<?php
use Illuminate\Support\Facades\Route;
use Modules\LuckyGame\Http\Controllers\LuckyGameController;

use Modules\LuckyGame\Http\Controllers\LuckyGameHistoryController;

Route::middleware(['api', 'custom_token_auth'])->prefix('luckygame')->group(function () {
    Route::post('start', [LuckyGameController::class, 'start']);
    Route::get('history', [LuckyGameHistoryController::class, 'index']);
});