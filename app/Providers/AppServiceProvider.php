<?php

namespace App\Providers;
use App\Models\Post;
use App\Models\Category;
use App\Models\Tag;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
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
        view()->composer('front.pages.sidebar',function ($view)
        {
            $view->with('popularPosts', Post::getPopularPosts());

            $view->with('featuredPosts', Post::getFeaturedPosts());

            $view->with('recentPosts', Post::getRecentPosts());

            $view->with('categories', Category::all());

            $view->with('tags', Tag::all());
        });
    }
}

