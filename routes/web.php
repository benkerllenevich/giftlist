<?php

use App\Http\Controllers\ListController;
use Illuminate\Support\Facades\Route;

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/', [ListController::class, 'index'])->name('home');
    Route::get('/list/{id}', [ListController::class, 'show'])->name('list');
});
