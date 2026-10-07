<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PublicController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\TeamController;

Route::get("/", [PublicController::class, "index"])->name("home");
Route::get("/partidos", [PublicController::class, "matches"])->name("matches.public");
Route::get("/clasificacion", [PublicController::class, "ranking"])->name("ranking.public");
Route::get("/calendario", [PublicController::class, "calendar"])->name("calendar.public");
Route::view('/', 'welcome');

Route::middleware(["auth", "can:admin-access"])->prefix("admin")->group(function () {
    Route::get("/dashboard", [DashboardController::class, "index"])->name("admin.dashboard");
    Route::resource("teams", TeamController::class);
});
Route::get('/', function () {
    return view('welcome');
});
