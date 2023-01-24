<?php

namespace App\Providers;

use App\Http\Controllers\ArticleController;
use App\Services\Interfaces\SaveImage;
use App\Services\Storage\ArticleStorageService;
use App\Services\Storage\UserStorageService;
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
        $this->app->when([UserStorageService::class, ])
            ->needs(SaveImage::class)
            ->give(function (){
                return UserStorageService::class;
            });
        $this->app->when([ArticleController::class, ])
            ->needs(SaveImage::class)
            ->give(function (){
                return ArticleStorageService::class;
            });
    }
}
