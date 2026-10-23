<?php

namespace App\Providers;

use Illuminate\Pagination\Paginator;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        //
    }

    public function boot(): void
    {
        // Paginador con el diseño del sitio: resources/views/pagination/fiba.blade.php
        Paginator::defaultView('pagination.fiba');
    }
}
