<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Models\DetailKeranjang;
use App\Models\Mentor;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        View::composer('*', function ($view) {
            $cart = session()->get('cart', []);
            $view->with('cart_item_count', count($cart));
        });

        try {
            $featuredMentor = Mentor::first();

            View::share('featuredMentor', $featuredMentor);
        } catch (\Exception $e) {
            View::share('featuredMentor', null);
        }
    }
}
