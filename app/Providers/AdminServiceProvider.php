<?php

namespace App\Providers;

use App\Http\Resources\v1\Admin\AdminAuthorResourceFactory;
use App\Http\Resources\v1\Admin\AdminBookResourceFactory;
use App\Http\Views\Admin\AdminAuthorView;
use App\Http\Views\Admin\AdminBookView;
use App\Interfaces\Responses\Admin\AdminAuthorResponseInterface;
use App\Interfaces\Responses\Admin\AdminBookResponseInterface;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Support\ServiceProvider;

class AdminServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(
            AdminBookResponseInterface::class,
            function (Application $app) {
                return request()->wantsJson()
                    ? $app->make(AdminBookResourceFactory::class)
                    : $app->make(AdminBookView::class);
            }
        );
        $this->app->bind(
            AdminAuthorResponseInterface::class,
            function (Application $app) {
                return request()->wantsJson()
                    ? $app->make(AdminAuthorResourceFactory::class)
                    : $app->make(AdminAuthorView::class);
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
