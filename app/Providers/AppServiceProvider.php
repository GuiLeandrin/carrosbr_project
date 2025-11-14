<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Event;
use Illuminate\Database\Events\MigrationsEnded;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // Rodar seeders automaticamente APÓS as migrations terminarem
        if ($this->app->runningInConsole()) {

            Event::listen(MigrationsEnded::class, function () {

                // Seeder do Admin
                Artisan::call('db:seed', [
                    '--class' => 'Database\\Seeders\\AdminUserSeeder'
                ]);

                // Seeder dos carros
                Artisan::call('db:seed', [
                    '--class' => 'Database\\Seeders\\CarsSeeder'
                ]);

            });
        }
    }
}
