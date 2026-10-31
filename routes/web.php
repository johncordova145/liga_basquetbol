<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\PublicController;
use App\Http\Controllers\StandingController;
use App\Http\Controllers\Admin\DashboardController;
use Illuminate\Http\Request;
use App\Http\Controllers\Admin\TeamController;
use App\Http\Controllers\Admin\PlayerController;
use App\Http\Controllers\Admin\MatchController;
use App\Http\Controllers\Admin\NewsController as AdminNewsController;
use App\Http\Controllers\AuthController;
use App\Models\News;

Route::get('/', [PublicController::class, 'home'])->name('home');
Route::get('/partidos', [PublicController::class, 'matches'])->name('matches.public');
Route::get('/calendario', [PublicController::class, 'calendar'])->name('calendar.public');
Route::get('/ranking', [StandingController::class, 'index'])->name('ranking.public');
Route::get('/tabla-posiciones', [StandingController::class, 'index'])->name('standings.index');
Route::get('/noticias', [PublicController::class, 'index'])->name('news.index');
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
Route::post('/register', [AuthController::class, 'register']);

Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
    Route::resource('teams', TeamController::class);
    Route::resource('players', PlayerController::class);
    Route::resource('matches', MatchController::class);
    
    Route::resource('news', AdminNewsController::class);

    Route::middleware(['auth'])->group(function () {
        Route::get('/dashboard-alt', [AdminNewsController::class, 'dashboard'])
            ->name('dashboard.alt')
            ->middleware('can:admin');
    });
});

Route::post('/logout', function (Request $request) {
    Auth::logout();
    $request->session()->invalidate();
    $request->session()->regenerateToken();
    return redirect('/');
})->name('logout');