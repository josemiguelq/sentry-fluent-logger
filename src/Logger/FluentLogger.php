<?php


namespace SentryFluentLogger\Logger;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Jenssegers\Mongodb\Eloquent\Model;
use Monolog\Logger;

class FluentLogger implements FluentLoggerInterface
{
	    private $message = '';
		    private $context = [];
		    private $extra = [];
			    private $defaultLevel = 'debug';

			    public function __construct(string $message = "")
					    {
							        $this->defaultLevel = env('APP_LOG_LEVEL', $this->defaultLevel);
									        $this->message = $message;
									        $this->context['tags'] = [];
											        $this->context['user'] = [];
											    }

				    public function tag(array $tag = [])
						    {
								        $this->setTag($tag);
										        return $this;
										    }

				    private function setTag(array $tags)
						    {
								        $this->context['tags'] = array_merge($this->context['tags'], $tags);
										    }

				    public function tags(array $tags = [])
						    {
								        foreach ($tags as $tag) {
											            $this->setTag($tag);
														        }
										    }

				    public function context(array $contexts = [])
						    {
								        foreach ($contexts as $context) {
											            if (is_array($contexts)) {
															                $this->context = array_merge($this->context, $contexts);
																			            }
														            try {
																		                $arrayable = $context->toArray();
																						                $this->context = array_merge($this->context, $arrayable);
																						            } catch (\Exception $exception) {
																										                continue;
																														            }
														        }
										        return $this;
										    }

				    public function level(string $level = 'debug')
						    {
								        if (array_search($level, Logger::getLevels())) {
											            $this->defaultLevel = $level;
														        }
										    }

				    public function extra(array $extras = [])
						    {
								        foreach ($extras as $key => $value) {
											            $this->extra[$key] = $value;
														        }

										        return $this;
										    }

				    public function fire()
						    {
								        $level = $this->defaultLevel;
										        $defaultUser = Auth::user() ?? [];
										        $this->user($defaultUser);
												        Log::$level($this->message, $this->context, $this->extra);
												    }

				    public function user($user = [])
						    {
								        if (is_array($user)) {
											            $this->setUser($user);
														        }

										        if ($user instanceof Model) {
													            $this->setUser($user->toArray());
																        }
										        return $this;
										    }

				    private function setUser(array $user)
						    {
								        $this->context['user'] = $user;
										    }
}


