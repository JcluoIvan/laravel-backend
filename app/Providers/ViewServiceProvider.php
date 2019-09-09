<?php

namespace App\Providers;

use App\Http\ViewComposers\ThemeTemplateComposer;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class ViewServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        view()->share([
            'themeTemplate' => 'default',
            'appTitle' => 'laravel - backend',
            'appName' => 'demo-backend',
        ]);
    }
}
