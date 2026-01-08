<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Repositories\Order\IOrderRepository;
use App\Repositories\Order\OrderRepository;
use App\Repositories\User\IUserRepository;
use App\Repositories\User\UserRepository;
use App\Repositories\Table\ITableRepository;
use App\Repositories\Table\TableRepository;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
        $this->app->bind(
            IOrderRepository::class,
            OrderRepository::class
        );
        $this->app->bind(
            IUserRepository::class,
            UserRepository::class
        );
        $this->app->bind(
            ITableRepository::class,
            TableRepository::class
        );
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
