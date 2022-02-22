<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(
            \App\Repositories\Exchange\ExchangeRepositoryContract::class,
            \App\Repositories\Exchange\ExchangeRepository::class
        );

        $this->app->bind(
            \App\Repositories\Provider\ProviderRepositoryContract::class,
            \App\Repositories\Provider\ProviderRepository::class
        );

        $this->app->bind(
            \App\Repositories\Custmer\CustmerRepositoryContract::class,
            \App\Repositories\Custmer\CustmerRepository::class
        );

        $this->app->bind(
            \App\Repositories\Plateform\PlateformRepositoryContract::class,
            \App\Repositories\Plateform\PlateformRepository::class
        );

        $this->app->bind(
            \App\Repositories\Game\GameRepositoryContract::class,
            \App\Repositories\Game\GameRepository::class
        );
        
        $this->app->bind(
            \App\Repositories\User\UserRepositoryContract::class,
            \App\Repositories\User\UserRepository::class
        );

        $this->app->bind(
            \App\Repositories\Import\ImportRepositoryContract::class,
            \App\Repositories\Import\ImportRepository::class
        );

        $this->app->bind(
            \App\Repositories\Inventory\InventoryRepositoryContract::class,
            \App\Repositories\Inventory\InventoryRepository::class
        );

        $this->app->bind(
            \App\Repositories\Order\OrderRepositoryContract::class,
            \App\Repositories\Order\OrderRepository::class
        );

        $this->app->bind(
            \App\Repositories\Retail\RetailRepositoryContract::class,
            \App\Repositories\Retail\RetailRepository::class
        );

        $this->app->bind(
            \App\Repositories\Permission\PermissionRepositoryContract::class,
            \App\Repositories\Permission\PermissionRepository::class
        );   
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);

        view()->composer([
            'layout.front.app',
        ], function ($view) {
            $view->with('cartcount', 
            Auth::check() ? 
            User::findOrFail(Auth::user() -> id) -> getCartCount() : null
            );
        });
    }
}
