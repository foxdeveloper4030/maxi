<?php

namespace App\Providers;

use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class ComposerServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $myViews = ['layouts.*', 'front.show_product2', 'front.step1'];
        View::composer($myViews, 'App\Http\ViewComposer\NewsletterComposer');
        View::composer($myViews, 'App\Http\ViewComposer\BrandComposer');
        View::composer($myViews, 'App\Http\ViewComposer\PageComposer');
    }
}
