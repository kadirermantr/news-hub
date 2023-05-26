<?php

namespace App\Middlewares;

use App\Exceptions\UnauthorizedException;
use Closure;
use Core\Application;
use Core\Middleware;
use Core\Request;

class Authenticate extends Middleware
{
    public array $actions = [];

    public function __construct(array $actions = [])
    {
        $this->actions = $actions;
    }

    /**
     * @throws UnauthorizedException
     */
    public function execute(): bool
	{
        if (empty($this->actions) || in_array(Application::$app->controller->action, $this->actions)) {
            if (isGuest()) {
                throw new UnauthorizedException();
            }
        }

        return true;
    }
}
