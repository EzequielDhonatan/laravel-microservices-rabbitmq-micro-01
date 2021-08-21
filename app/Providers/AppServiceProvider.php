<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use App\Models\Api\V1\{

    Category\Category

}; // Models

use App\Observers\Api\V1\{

    Category\CategoryObserver

}; // Observers

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
        Category::observe( CategoryObserver::class );
    }

} // AppServiceProvider
