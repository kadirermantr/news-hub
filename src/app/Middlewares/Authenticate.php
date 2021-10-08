<?php

namespace App\Middlewares;

use App\Exceptions\ForbiddenException;
use Closure;
use Core\Application;
use Core\Middleware;
use Core\Request;

class Authenticate extends Middleware
{
    /**
     * @param Closure $next
     * @param Request $request
     * @return mixed
     * @throws ForbiddenException
     */
    public function handle(Closure $next, $request)
    {
        if (isGuest()) {
            if (empty($this->actions) || in_array(Application::$app->controller->action, $this->actions)) {
                throw new ForbiddenException();
            }
        }

        return $next($request);
    }
}