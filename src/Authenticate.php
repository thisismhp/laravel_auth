<?php

namespace LaravelAuthExcept;

use Closure;
use Illuminate\Auth\Middleware\Authenticate as Middleware;

class Authenticate extends Middleware
{

    private $except = [];

    public function handle($request, Closure $next, ...$guards)
    {
        $uri = $request->getRequestUri();

        $method = $request->method();

        if (in_array($uri, $this->except)){
            return $next($request);
        }

        if (key_exists($uri, $this->except)){
            if (is_array($this->except[$uri]) and in_array($method, $this->except[$uri])){
                return $next($request);
            }
        }

        $this->authenticate($request, $guards);

        return $next($request);
    }
}