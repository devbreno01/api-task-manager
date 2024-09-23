<?php

namespace App\Providers;

use App\Repositories\CategoryRepositoryInterface;
use App\Repositories\CategoryEloquentORM;
use App\Repositories\TaskEloquentORM;
use App\Repositories\TaskRepositoryInterface;
use App\Repositories\UserEloquentORM;
use App\Repositories\UserRepositoryInterface;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(
            CategoryRepositoryInterface::class,  CategoryEloquentORM::class 
        );

        $this->app->bind(
            TaskRepositoryInterface::class , TaskEloquentORM::class
        );

        $this->app->bind(
            UserRepositoryInterface::class, UserEloquentORM::class
        );
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
