<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use App\Models\Api\V1\{

    Category\Category,
    Company\Company

}; // Models

use App\Observers\Api\V1\{

    Category\CategoryObserver,
    Company\CompanyObserver

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
        Category::observe( CategoryObserver::class ); ## CATEGORY
        Company::observe( CompanyObserver::class ); ## COMPANY
    }

} // AppServiceProvider
