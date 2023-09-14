<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;
use App\Handlers\AuthHandler;
use App\Handlers\UserLoginAPIHandler;
use App\Handlers\UserLoginWebHandler;
use App\Http\Requests\API\LoginAPIRequest;
use App\Http\Requests\API\RegisterAPIRequest;
use App\Http\Requests\Web\LoginWebRequest;
use App\Http\Requests\Web\RegisterWebRequest;
use App\Http\Resources\v1\LoginResource;
use App\Http\Resources\v1\RegisterResource;
use App\Http\Views\Auth\LoginView;
use App\Http\Views\Auth\RegisterView;
use App\Interfaces\Handlers\Auth\AuthHandlerInterface;
use App\Interfaces\Handlers\Auth\LoginHandlerInterface;
use App\Interfaces\Handlers\Auth\RegisterHandlerInterface;
use App\Interfaces\Handlers\Auth\UserLoginHandlerInterface;
use App\Interfaces\Requests\Auth\LoginRequestInterface;
use App\Interfaces\Requests\Auth\RegisterRequestInterface;
use App\Interfaces\Responses\Auth\LoginResponseInterface;
use App\Interfaces\Responses\Auth\RegisterResponseInterface;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        //
    ];

    /**
     * Register the application's policies and related interfaces.
     *
     * @return void
     */
    public function register(): void
    {
        parent::register();

        $this->app->bind(
            LoginHandlerInterface::class,
            AuthHandlerInterface::class,
        );
        $this->app->bind(
            RegisterHandlerInterface::class,
            AuthHandlerInterface::class,
        );
        $this->app->bind(
            AuthHandlerInterface::class,
            AuthHandler::class,
        );
        $this->app->bind(
            LoginRequestInterface::class,
            function (Application $app) {
                return request()->wantsJson()
                    ? $app->make(LoginAPIRequest::class)
                    : $app->make(LoginWebRequest::class);
            }
        );
        $this->app->bind(
            UserLoginHandlerInterface::class,
            function (Application $app) {
                return request()->wantsJson()
                    ? $app->make(UserLoginAPIHandler::class)
                    : $app->make(UserLoginWebHandler::class);
            }
        );
        $this->app->bind(
            LoginResponseInterface::class,
            function (Application $app) {
                return request()->wantsJson()
                    ? $app->makeWith(LoginResource::class, ['resource' => []])
                    : $app->make(LoginView::class);
            }
        );
        $this->app->bind(
            RegisterRequestInterface::class,
            function (Application $app) {
                return request()->wantsJson()
                    ? $app->make(RegisterAPIRequest::class)
                    : $app->make(RegisterWebRequest::class);
            }
        );
        $this->app->bind(
            RegisterResponseInterface::class,
            function (Application $app) {
                return request()->wantsJson()
                    ? $app->makeWith(RegisterResource::class, ['resource' => []])
                    : $app->make(RegisterView::class);
            }
        );
    }

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        //
    }
}
