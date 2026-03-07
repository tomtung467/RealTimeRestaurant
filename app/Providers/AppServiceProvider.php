<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Repositories\User\IUserRepository;
use App\Repositories\User\UserRepository;
use App\Services\User\IUserService;
use App\Services\User\UserService;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
                $this->app->bind(
            IUserRepository::class,
            UserRepository::class
        );
        $this->app->bind(
            IUserService::class,
            UserService::class
        );
        $this ->app->bind(
            \App\Repositories\Category\ICategoryRepository::class,
            \App\Repositories\Category\CategoryRepository::class
        );
        $this ->app->bind(
            \App\Services\Category\ICategoryService::class,
            \App\Services\Category\CategoryService::class
        );
        $this ->app->bind(
            \App\Repositories\Food\IFoodRepository::class,
            \App\Repositories\Food\FoodRepository::class
        );
        $this ->app->bind(
            \App\Services\Food\IFoodService::class,
            \App\Services\Food\FoodService::class
        );
        $this ->app->bind(
            \App\Repositories\Ingredient\IIngredientRepository::class,
            \App\Repositories\Ingredient\IngredientRepository::class
        );
        $this ->app->bind(
            \App\Services\Ingredient\IIngredientService::class,
            \App\Services\Ingredient\IngredientService::class
        );
            $this ->app->bind(
                \App\Repositories\Order\IOrderRepository::class,
                \App\Repositories\Order\OrderRepository::class
            );
            $this ->app->bind(
                \App\Services\Order\IOrderService::class,
                \App\Services\Order\OrderService::class
            );
            $this ->app->bind(
                \App\Repositories\OrderItem\IOrderItemRepository::class,
                \App\Repositories\OrderItem\OrderItemRepository::class
            );
            $this ->app->bind(
                \App\Services\OrderItem\IOrderItemService::class,
                \App\Services\OrderItem\OrderItemService::class
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
