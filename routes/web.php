<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ListController;
use Illuminate\Support\Facades\Route;

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/', [DashboardController::class, 'lists'])->name('home');

    Route::get('/list/{id}', [ListController::class, 'items'])->name('list.items');
    Route::get('/list/{id}/settings', [ListController::class, 'settings'])->name('list.settings');
});
