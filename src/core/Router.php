<?php

namespace Core;


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

    public function resolve()
    {
        $path = $this->request->getPath();
        $method = $this->request->method();
        $callback = $this->routes[$method][$path] ?? false;

        if ($callback === false) {
            http_response_code(404);
            return $this->view('404', 'Hata | 404');
        }

        if (is_string($callback)) {
            return $this->view($callback);
        }

        if (is_array($callback)) {
            $callback[0] = new $callback[0]();
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
        unset($_SESSION['error']);
        return ob_get_clean();
    }
}