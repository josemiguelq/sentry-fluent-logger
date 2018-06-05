<?php

/**
 *  * Exporting instance of the class Logger
 *   */
function fluentLogger()
{
	    return app()->make(FluentLoggerInterface::class);
}

