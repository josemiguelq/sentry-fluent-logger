<?php

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\App;

class SentryFluentLoggerProvider extends ServiceProvider
{
    public function register()
    {
		App::bind('sentry-fluent', function () {
            return new SentryFluentLogger\Logger\LogHelper();
        });
        require_once __DIR__ . '../../src/Logger/FluentLogger.php';
    }
}

