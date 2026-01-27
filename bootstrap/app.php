<?php

use App\Http\Middleware\AccessCheckMiddleware;
use App\Http\Middleware\HandleInertiaRequests;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__ . '/../routes/web.php',
        api: __DIR__ . '/../routes/api.php',
        commands: __DIR__ . '/../routes/console.php',
        apiPrefix: '',
    )
    ->withMiddleware(function (Middleware $middleware) {
        $middleware->web(append: [
            HandleInertiaRequests::class,
        ]);
        //Кастомный middleware для проверки гет-параметра авторизации
        $middleware->alias([
            'access' => AccessCheckMiddleware::class,
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions) {})->create();
