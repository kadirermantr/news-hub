<?php

namespace Core;

abstract class Controller
{
    public function view(string $view, ?string $title = null, array $data = [])
    {
        return Application::$app->router->view($view, $title, $data);
    }
}