<?php

namespace App\Providers;

use App\Models\Reservation;
use Carbon\Carbon;
use Illuminate\Contracts\View\View;
use Illuminate\Support\ServiceProvider;

use Illuminate\Support\Facades\Schema;
class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        Schema::defaultStringLength(191);
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {

        view()->composer('*', function ($view) {
            $reservationCount = Reservation::where('user_id', auth()->id())
                                           ->where('date_rec', '>', Carbon::now())
                                           ->count();
            $view->with('reservationCount', $reservationCount);
        });

    }
}
