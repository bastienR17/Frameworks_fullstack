<?php

use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Controllers\TrackController;
use App\Http\Controllers\PlaylistController;
use App\Http\Middleware\IsAdmin;
use GuzzleHttp\Promise\TaskQueueInterface;
use App\Http\Controllers\ApiKeyController;


Route::get('/', [TrackController::class, 'index'])->name('tracks.index');

Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified'])->group(function () {
    Route::resource('playlists', PlaylistController::class);



    Route::name('tracks.')->prefix('tracks')->controller(TrackController::class)->middleware([IsAdmin::class])->group(function() {
        Route::get('/create', 'create')->name('create');
        Route::post('/', 'store')->name('store');
        Route::get('/{track}', 'show')->name('show');
        Route::get('/{track}/edit', 'edit')->name('edit');
        Route::put('/{track}', 'update')->name('update');
        Route::delete('/{track}', 'destroy')->name('destroy');
        Route::get('/user/playlists', [PlaylistController::class, 'playlists'])->name('user.playlists')->middleware('auth');

    });

    Route::get('/api-keys', [ApiKeyController::class, 'index'])->name('API.index');
    Route::post('/api/keys/store', [ApiKeyController::class, 'store']);

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', function () {
    })->name('dashboard');
});

});




