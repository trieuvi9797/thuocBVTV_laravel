<?php
 
namespace App\Providers;
 
use App\View\Composers\ProfileComposer;
use Illuminate\Support\Facades;
use Illuminate\Support\ServiceProvider;
use Illuminate\View\View;
 
class ViewServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        // ...
    }

    public function boot(): void
    {
        // Using class based composers...
        Facades\View::composer('profile', ProfileComposer::class);
 
        // Using closure based composers...
        Facades\View::composer('welcome', function (View $view) {
            // ...
        });
 
        Facades\View::composer('dashboard', function (View $view) {
            // ...
        });
    }
}