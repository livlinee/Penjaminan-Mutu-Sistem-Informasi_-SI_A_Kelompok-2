<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Models\DetailKeranjang;
use App\Models\Mentor;
use Illuminate\Support\Facades\URL;

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
            // 1. Ambil SEMUA mentor
            $featuredMentors = Mentor::all();

            // 2. Kirim SEMUA mentor (plural)
            View::share('featuredMentors', $featuredMentors);
            // 3. Kirim JUMLAH mentor untuk logika timer
            View::share('mentorCount', $featuredMentors->count());
        } catch (\Exception $e) {
            // Tangani error jika database belum siap
            View::share('featuredMentors', collect()); // Kirim koleksi kosong
            View::share('mentorCount', 0); // Kirim jumlah 0
        }
    }
}
