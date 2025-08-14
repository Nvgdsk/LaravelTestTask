<?php

use Illuminate\Support\Facades\Route;
use Modules\User\Http\Controllers\AccessLinkController;

Route::middleware(['api', 'custom_token_auth'])->prefix('access-link')->group(function (): void {
    Route::post('generate', [AccessLinkController::class, 'generate']);
    Route::delete('remove', [AccessLinkController::class, 'remove']);
});
