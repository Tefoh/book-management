<?php

namespace App\Providers;

use App\Handlers\BookHandler;
use App\Handlers\ReserveHandler;
use App\Http\Resources\v1\Book\AllBooksResourceFactory;
use App\Http\Resources\v1\Book\ReleaseResourceFactory;
use App\Http\Resources\v1\Book\ReserveResourceFactory;
use App\Http\Resources\v1\Book\SingleBookResourceFactory;
use App\Http\Views\Book\AllBookViewFactory;
use App\Http\Views\Book\ReleaseViewFactory;
use App\Http\Views\Book\ReserveViewFactory;
use App\Http\Views\Book\SingleBookViewFactory;
use App\Interfaces\Handlers\Book\BookHandlerInterface;
use App\Interfaces\Handlers\Book\ReserveHandlerInterface;
use App\Interfaces\Responses\Book\AllBooksResponseInterface;
use App\Interfaces\Responses\Book\ReleaseResponseInterface;
use App\Interfaces\Responses\Book\ReserveResponseInterface;
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
        $this->app->bind(
            ReserveHandlerInterface::class,
            ReserveHandler::class
        );
        $this->app->bind(
            ReserveResponseInterface::class,
            function (Application $app) {
                return request()->wantsJson()
                    ? $app->make(ReserveResourceFactory::class)
                    : $app->make(ReserveViewFactory::class);
            }
        );
        $this->app->bind(
            ReleaseResponseInterface::class,
            function (Application $app) {
                return request()->wantsJson()
                    ? $app->make(ReleaseResourceFactory::class)
                    : $app->make(ReleaseViewFactory::class);
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
