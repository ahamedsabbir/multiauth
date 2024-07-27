<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use App\Http\Middleware\AdminCheck;
use App\Http\Middleware\AuthorCheck;
use App\Http\Middleware\EditorCheck;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        $middleware->alias(
			[
				'admin' => AdminCheck::class,
				'author' => AuthorCheck::class,
				'editor' => EditorCheck::class
			]
		);
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();
