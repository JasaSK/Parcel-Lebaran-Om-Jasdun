<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use Illuminate\Http\Request;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__ . '/../routes/web.php',
        commands: __DIR__ . '/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware): void {
        $middleware->alias([
            App\Http\Middleware\CheckLogin::class,
        ]);
    })
    ->withExceptions(function (Illuminate\Foundation\Configuration\Exceptions $exceptions): void {
        $exceptions->render(function (\Throwable $e, \Illuminate\Http\Request $request) {
            return response(
                "ROOT ERROR\n" .
                    "CLASS: " . get_class($e) . "\n" .
                    "MESSAGE: " . $e->getMessage() . "\n" .
                    "FILE: " . $e->getFile() . "\n" .
                    "LINE: " . $e->getLine() . "\n\n" .
                    "TRACE:\n" . $e->getTraceAsString(),
                500,
                ['Content-Type' => 'text/plain; charset=UTF-8']
            );
        });
    });
