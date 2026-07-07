<?php

namespace App\Providers;

use App\Models\Article;
use App\Models\Category;
use App\Models\Destination;
use App\Models\Faq;
use App\Models\TourPackage;
use App\Observers\ContentObserver;
use Illuminate\Support\ServiceProvider;

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
        TourPackage::observe(ContentObserver::class);
        Category::observe(ContentObserver::class);
        Destination::observe(ContentObserver::class);
        Article::observe(ContentObserver::class);
        Faq::observe(ContentObserver::class);
    }
}
