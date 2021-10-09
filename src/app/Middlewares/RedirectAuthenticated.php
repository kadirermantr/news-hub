<?php

namespace App\Middlewares;

use Closure;
use Core\Middleware;
use Core\Request;

class RedirectAuthenticated extends Middleware
{
    /**
     * @param Closure $next
     * @param Request $request
     * @return mixed
     */
    public function handle(Closure $next, $request)
    {
        if (!isGuest()) {
            redirect('/', 204);
        }

        return $next($request);
    }
}