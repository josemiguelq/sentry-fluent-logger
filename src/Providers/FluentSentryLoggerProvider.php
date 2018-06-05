<?php

namespace SentryFluentLogger\Logger;

use Illuminate\Support\Facades\App;
use Illuminate\Support\ServiceProvider;

class FluentSentryLoggerProvider extends ServiceProvider
{
	    public function register()
			    {
					        $this->app->bind(\SentryFluentLogger\Logger\FluentLoggerInterface::class, function () {
								            return new SentryFluentLogger\Logger\FluentLogger();
											        });
							    }
}


