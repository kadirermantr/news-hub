<?php

namespace App\Middlewares;

use Closure;
use Core\Application;
use Core\Middleware;
use Core\Request;

class RedirectAuthenticated extends Middleware
{
    public array $actions = [];

    public function __construct(array $actions = [])
    {
        $this->actions = $actions;
    }

    public function execute()
    {
        if (empty($this->actions) || in_array(Application::$app->controller->action, $this->actions)) {
            if (!isGuest()) {
                redirect('/', 204);
            }
        }

        return true;
    }
}