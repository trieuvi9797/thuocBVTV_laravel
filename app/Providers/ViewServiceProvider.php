<?php
 
namespace App\Providers;

use App\Http\View\Composers\CategoryComposer;
use App\View\Composers\ProfileComposer;
use Illuminate\Support\Facades;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
 
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
        View::composer('client.layouts.header', CategoryComposer::class);
        View::composer('client.layouts.footer', CategoryComposer::class);
    }
}