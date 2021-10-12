<?php

namespace Core;

use App\Exceptions\NotFoundException;
use App\Exceptions\ServiceUnavailableException;

class Router
{
    public Request $request;
    protected array $routes = [];

    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    public function get($path, $callback)
    {
        $this->routes['get'][$path] = $callback;
    }

    public function post($path, $callback)
    {
        $this->routes['post'][$path] = $callback;
    }

    /**
     * @throws NotFoundException
     * @throws ServiceUnavailableException
     */
    public function resolve()
    {
        $path = $this->request->getPath();
        $method = $this->request->method();
        $callback = $this->routes[$method][$path] ?? false;

        if (env('MAINTENANCE_MODE') == true) {
            Session::close();
            throw new ServiceUnavailableException();
        }

        if ($callback === false) {
            throw new NotFoundException();
        }

        if (is_string($callback)) {
            return $this->view($callback);
        }

        if (is_array($callback)) {
            validate_input();

            $controller = new $callback[0]();
            Application::$app->controller = $controller;
            $controller->action = $callback[1];
            $callback[0] = $controller;

            $request = new Request();
            $middlewares = $controller->getMiddlewares() ?? [];

            foreach ($middlewares as $middleware) {
                $middleware->execute();
            }
        }

        return call_user_func($callback, $this->request);
    }

    public function view(string $view, ?string $title = null, array $data = [])
    {
        if (is_null($title)) {
            $title = env('APP_NAME');
        }

        foreach ($data as $key => $value) {
            $$key = $value;
        }

        ob_start();
        require_once __DIR__ . "/../app/views/$view.php";
        unset($_SESSION['success']);
        unset($_SESSION['error']);
        return ob_get_clean();
    }
}