<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Store\Cart\CartRepository;
class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $cartRepository = new CartRepository();
        view()->composer('*', function ($view) use ($cartRepository) {
            if(\Auth::check()){
                $currentUser = \Auth::user();
                $currentCartUser = $cartRepository->getActiveCartForUser($currentUser);
                view()->share('currentCartUser', $currentCartUser);
            }
        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
