<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Repository\PacientesRepository;
use App\Interface\PacientesRepositoryInterface;
use App\Services\PacientesService;

use App\Repository\ConsultasRepository;
use App\Interface\ConsultasRepositoryInterface;
use App\Services\ConsultasService;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(PacientesRepositoryInterface::class, PacientesRepository::class);
        $this->app->bind(PacientesService::class, function ($app) {
            return new PacientesService($app->make(PacientesRepositoryInterface::class));
        });

        $this->app->bind(ConsultasRepositoryInterface::class, ConsultasRepository::class);
        $this->app->bind(ConsultasService::class, function ($app) {
            return new ConsultasService($app->make(ConsultasRepositoryInterface::class));
        });
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
