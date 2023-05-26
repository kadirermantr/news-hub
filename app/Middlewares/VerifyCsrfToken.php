<?php

namespace App\Middlewares;

use App\Exceptions\PageExpiredException;
use Closure;
use Core\Application;
use Core\Middleware;
use Core\Request;
use Core\Session;

class VerifyCsrfToken extends Middleware
{
    public array $actions = [];

    public function __construct(array $actions = [])
    {
        $this->actions = $actions;
    }

    /**
     * @throws PageExpiredException
     */
    public function execute(): bool
	{
        if (empty($this->actions) || in_array(Application::$app->controller->action, $this->actions)) {
            $token = Session::get('token');
            $postToken = $_POST["_token"] ?? '';

            if ($token !== $postToken) {
                throw new PageExpiredException();
            }
        }

        return true;
    }
}
