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

    public function get($path, $callback): void
	{
        $this->routes['get'][$path] = $callback;
    }

    public function post($path, $callback): void
	{
        $this->routes['post'][$path] = $callback;
    }

    /**
     * @throws NotFoundException
     * @throws ServiceUnavailableException
     */
    public function resolve()
    {
		// Check if the application is in maintenance mode
		if (env('MAINTENANCE_MODE')) {
			Session::close();
			throw new ServiceUnavailableException();
		}

        $path = $this->request->getPath();
        $method = $this->request->method();
        $callback = $this->routes[$method][$path] ?? false;

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
        require_once __DIR__ . "/../resources/views/$view.php";
        unset($_SESSION['success']);
        unset($_SESSION['error']);
        return ob_get_clean();
    }
}
