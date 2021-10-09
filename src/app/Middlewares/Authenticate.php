<?php

namespace App\Middlewares;

use App\Exceptions\UnauthorizedException;
use Closure;
use Core\Middleware;
use Core\Request;

class Authenticate extends Middleware
{
    /**
     * @param Closure $next
     * @param Request $request
     * @return mixed
     * @throws UnauthorizedException
     */
    public function handle(Closure $next, $request)
    {
        if (isGuest()) {
            throw new UnauthorizedException();
        }

        return $next($request);
    }
}