<?php

namespace App\Providers;

use App\Http\Repositories\CustomerRepositoryInterface;
use App\Http\Repositories\IPLM\CustomerRepository;
use App\Http\Services\CustomerServiceInterface;
use App\Http\Services\IMPL\CustomerService;
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
        $this->app->singleton(CustomerRepositoryInterface::class,
            CustomerRepository::class);
        $this->app->singleton(CustomerServiceInterface::class,
            CustomerService::class);
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
