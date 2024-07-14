<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApiKeyController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::middleware('auth:sanctum')->group(function () {
    Route::get('/keys', [ApiKeyController::class, 'index'])->name('apikeys.index');
    Route::post('/keys', [ApiKeyController::class, 'store'])->name('apikeys.store');
    Route::delete('/keys/{apiKey}', [ApiKeyController::class, 'destroy'])->name('apikeys.destroy');
});
