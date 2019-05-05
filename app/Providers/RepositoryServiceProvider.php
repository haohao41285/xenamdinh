<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(\App\Repositories\PageRepository::class,\App\Repositories\PageRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\XeKhachRepository::class,\App\Repositories\XeKhachRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\XeTaiRepository::class,\App\Repositories\XeTaiRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\TaxiRepository::class,\App\Repositories\TaxiRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\TuyenDungRepository::class,\App\Repositories\TuyenDungRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\TinTucRepository::class,\App\Repositories\TinTucRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\NewsRepository::class,\App\Repositories\NewsRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\NewsPathRepository::class,\App\Repositories\NewsPathRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\TuyenRepository::class,\App\Repositories\TuyenRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\CustomerRepository::class,\App\Repositories\CustomerRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\CustomerNewsRepository::class,\App\Repositories\CustomerNewsRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\TicketRepository::class,\App\Repositories\TicketRepositoryEloquent::class);
         $this->app->bind(\App\Repositories\ContactRepository::class,\App\Repositories\ContactRepositoryEloquent::class);
         //new
         $this->app->bind(\App\Repositories\RoutingTransportRepository::class,\App\Repositories\RoutingTransportRepositoryEloquent::class);
         $this->app->bind(\App\Repositories\TransportRepository::class,\App\Repositories\TransportRepositoryEloquent::class);
         $this->app->bind(\App\Repositories\CateTransportRepository::class,\App\Repositories\CateTransportRepositoryEloquent::class);
         $this->app->bind(\App\Repositories\NewsCateRepository::class,\App\Repositories\NewsCateRepositoryEloquent::class);

    }
}
