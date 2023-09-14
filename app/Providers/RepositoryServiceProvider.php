<?php

namespace App\Providers;

use App\Interfaces\Repositories\AuthorRepositoryInterface;
use App\Interfaces\Repositories\BookRepositoryInterface;
use App\Interfaces\Repositories\UserRepositoryInterface;
use App\Repositories\AuthorRepository;
use App\Repositories\BookRepository;
use App\Repositories\UserRepository;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(
            AuthorRepositoryInterface::class,
            AuthorRepository::class,
        );
        $this->app->bind(
            BookRepositoryInterface::class,
            BookRepository::class,
        );
        $this->app->bind(
            UserRepositoryInterface::class,
            UserRepository::class,
        );
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
