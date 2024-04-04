<?php

namespace App\Providers;

use App\Contracts\EmployeeImporter;
use Illuminate\Support\ServiceProvider;
use App\Services\RetoolEmployeeImporter;
use App\Services\MockiEmployeeImporter;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(EmployeeImporter::class, function ($app) {
            
            $driver = config('app.api_driver');

            if ($driver === 'retoolapi') {
                return new RetoolEmployeeImporter();
            } elseif ($driver === 'mocki') {
                return new MockiEmployeeImporter();
            } else {
                throw new \Exception("Invalid API driver specified in the config file.");
            }
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
