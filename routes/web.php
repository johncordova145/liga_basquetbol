<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\PublicController;
use App\Http\Controllers\StandingController;
use App\Http\Controllers\NewsController as PublicNewsController;

use App\Http\Controllers\Admin\DashboardController;
use Illuminate\Http\Request;
use App\Http\Controllers\Admin\TeamController;
use App\Http\Controllers\Admin\PlayerController;
use App\Http\Controllers\Admin\MatchController;
use App\Http\Controllers\Admin\NewsController as AdminNewsController;


Route::get('/', [PublicController::class, 'home'])->name('home');
Route::get('/partidos', [PublicController::class, 'matches'])->name('matches.public');
Route::get('/calendario', [PublicController::class, 'calendar'])->name('calendar.public');
Route::get('/ranking', [StandingController::class, 'index'])->name('ranking.public');
Route::get('/tabla-posiciones', [StandingController::class, 'index'])->name('standings.index');
Route::get('/noticias', [PublicController::class, 'index'])->name('news.index');
Route::get('/ranking', [PublicController::class, 'ranking'])->name('ranking.public');

Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
    Route::resource('teams', TeamController::class);
    Route::resource('players', PlayerController::class);
    Route::resource('matches', MatchController::class);
    Route::prefix('admin')->name('admin.')->middleware(['auth'])->group(function () {
        Route::resource('news', AdminNewsController::class);
    });
    Route::resource('news', AdminNewsController::class);
    Route::put('/teams/{team}', [TeamController::class, 'update'])->name('admin.teams.update');
    
});
Route::post('/logout', function (Request $request) {
    Auth::logout();
    $request->session()->invalidate();
    $request->session()->regenerateToken();
    return redirect('/');
})->name('logout');