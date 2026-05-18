<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Models\Section;

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

            $view->with(

                'regionales',

                Section::where(
                    'type',
                    'regionale'
                )->get()

            );

            $view->with(

                'departementales',

                Section::where(
                    'type',
                    'departementale'
                )->get()

            );

            $view->with(

                'diasporas',

                Section::where(
                    'type',
                    'diaspora'
                )->get()

            );

        });
    }
}
