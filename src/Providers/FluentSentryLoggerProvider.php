<?php

use Illuminate\Support\ServiceProvider;

class SentryFluentLoggerProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind('sentry-fluent', function () {
            return new SentryFluentLogger\Logger\LogHelper();
        });
        require_once __DIR__ . '../../src/Logger/FluentLogger.php';
    }
}

