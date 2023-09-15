<?php

namespace App\Providers;

use App\Handlers\BookHandler;
use App\Http\Resources\v1\Book\AllBooksResourceFactory;
use App\Http\Views\Book\AllBookViewFactory;
use App\Interfaces\Handlers\Book\BookHandlerInterface;
use App\Interfaces\Responses\Book\AllBooksResponseInterface;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Support\ServiceProvider;

class BookServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(
            BookHandlerInterface::class,
            BookHandler::class
        );
        $this->app->bind(
            AllBooksResponseInterface::class,
            function (Application $app) {
                return request()->wantsJson()
                    ? $app->make(AllBooksResourceFactory::class)
                    : $app->make(AllBookViewFactory::class);
            }
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
