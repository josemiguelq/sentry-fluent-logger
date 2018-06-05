<?php

namespace SentryFluentLogger\Logger;

interface FluentLoggerInterface
{
	    public function tag(array $tag = []);

		    public function level(string $level = 'debug');

		    public function user($user = []);

			    public function fire();
}

