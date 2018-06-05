<?php

use Illuminate\Support\Facades\App;

/**
 * Exporting instance of the class Logger
 */
function fluentLogger(){
    return App::make('sentry-fluent');
}
