<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PublicController;
use App\Http\Controllers\StandingController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\TeamController;
use App\Http\Controllers\NewsController;

Route::get('/', [PublicController::class, 'home'])->name('home');
Route::get('/partidos', [PublicController::class, 'matches'])->name('matches.public');
Route::get('/clasificacion', [PublicController::class, 'ranking'])->name('ranking.public');
Route::get('/calendario', [PublicController::class, 'calendar'])->name('calendar.public');
Route::get('/posiciones', [StandingController::class, 'index'])->name('standings.index');
Route::get('/noticias', [NewsController::class, 'index'])->name('news.index');

