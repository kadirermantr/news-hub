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

    public function middleware(...$middlewares): array
    {
        foreach ($middlewares as $middleware) {
            $this->middlewares[] = $middleware;
        }

        return $this->middlewares;
    }

    public function getMiddlewares(): array
    {
        return $this->middlewares;
    }
}