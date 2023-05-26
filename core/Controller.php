<?php

namespace Core;

abstract class Controller
{
    public string $action = '';
    protected array $middlewares = [];

    public static function view(string $view, ?string $title = null, array $data = [])
    {
        return Application::$app->router->view($view, $title, $data);
    }

    public function middleware(Middleware $middleware): void
	{
        $this->middlewares[] = $middleware;
    }

    public function getMiddlewares(): array
    {
        return $this->middlewares;
    }
}
