<?php

namespace App\Providers;

use App\Handlers\BookHandler;
use App\Http\Resources\v1\Book\AllBooksResourceFactory;
use App\Http\Resources\v1\Book\SingleBookResourceFactory;
use App\Http\Views\Book\AllBookViewFactory;
use App\Http\Views\Book\SingleBookViewFactory;
use App\Interfaces\Handlers\Book\BookHandlerInterface;
use App\Interfaces\Responses\Book\AllBooksResponseInterface;
use App\Interfaces\Responses\Book\SingleBookResponseInterface;
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
        $this->app->bind(
            SingleBookResponseInterface::class,
            function (Application $app) {
                return request()->wantsJson()
                    ? $app->make(SingleBookResourceFactory::class)
                    : $app->make(SingleBookViewFactory::class);
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
