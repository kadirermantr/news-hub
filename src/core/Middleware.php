<?php

namespace Core;

use Closure;

abstract class Middleware
{
    abstract public function handle(Closure $next, $request);

    public static function call($class, $next, $request)
    {
        return call_user_func_array([new $class, 'handle'], [$next , $request]);
    }
}