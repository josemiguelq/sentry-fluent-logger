<?php

class SentryFluentLoggerProvider extends ServiceProvider
{
	    public function register()
		{
		       require_once app_path('src/FluentLogger.php');
		}
}

