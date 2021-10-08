<?php

namespace App\Middlewares;

use App\Exceptions\PageExpiredException;
use Closure;
use Core\Middleware;
use Core\Request;
use Core\Session;

class VerifyCsrfToken extends Middleware
{
    /**
     * @param Closure $next
     * @param Request $request
     * @throws PageExpiredException
     */
    public function handle(Closure $next, $request)
    {
        $method = $request->method();

        if ($method === 'post') {
            $token = Session::get('token');
            $postToken = $request->getBody()["_token"] ?? '';

            if ($token !== $postToken) {
                throw new PageExpiredException();
            }
        }

        return $next($request);
    }
}