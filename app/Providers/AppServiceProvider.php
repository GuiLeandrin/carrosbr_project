<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Artisan;

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
        if (app()->runningInConsole()) {
            $this->callAfterResolving('migrator', function ($migrator) {
                Artisan::call('db:seed', ['--class' => 'Database\\Seeders\\AdminUserSeeder']);
                
                Artisan::call('db:seed', ['--class' => 'Database\\Seeders\\CarsSeeder']);
            });
        }
    }
}
