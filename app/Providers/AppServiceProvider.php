<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        // Add for infyom
        Route::prefix('api/v1')
        ->middleware('api')
        ->as('api.')
        ->namespace($this->app->getNamespace().'Http\Controllers\API')
        ->group(base_path('routes/api.php'));
    }
}
