<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;

Route::get('/', function () {
    return redirect('/login');
});

Route::get('/login',       [PageController::class, 'showLogin']);
Route::get('/dashboard',   [PageController::class, 'showDashboard']);
Route::get('/profil',      [PageController::class, 'showProfil']);
Route::get('/pengelolaan', [PageController::class, 'showPengelolaan']);
Route::post('/login/proses', [PageController::class, 'prosesLogin']);
Route::post('/logout', [PageController::class, 'logout']);
