<?php

namespace App\Middlewares;

use App\Exceptions\UnauthorizedException;
use Closure;
use Core\Application;
use Core\Middleware;
use Core\Request;

class RolePermissionChecker extends Middleware
{
    public array $actions = [];
    public int $role_level;

    public function __construct(int $role_level, array $actions = [])
    {
        $this->actions = $actions;
        $this->role_level = $role_level;
    }

    /**
     * @throws UnauthorizedException
     */
    public function execute(): bool
	{
        $user_role_level = user('role_level');

        if (empty($this->actions) || in_array(Application::$app->controller->action, $this->actions)) {
            if ($user_role_level >= $this->role_level) {
                return true;
            } else {
                throw new UnauthorizedException();
            }
        }

		return true;
    }
}
