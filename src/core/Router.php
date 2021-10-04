<?php

namespace Core;

class Router
{
    private array $handlers;
    private $notFoundHandler;
    private const METHOD_GET = 'GET';
    private const METHOD_POST = 'POST';

    public function get(string $uri, $handler): void
    {
        $this->addHandler(self::METHOD_GET, $uri, $handler);
    }

    public function post(string $uri, $handler): void
    {
        $this->addHandler(self::METHOD_POST, $uri, $handler);
    }

    public function addNotFoundHandler($handler): void
    {
        $this->notFoundHandler = $handler;
    }

    private function addHandler(string $method, string $uri, $handler): void
    {
        $this->handlers[$method . $uri] = [
            'path'      => $uri,
            'method'    => $method,
            'handler'   => $handler,
        ];
    }

    public function run()
    {
        session_start();
        session_destroy();

        $requestUri = parse_url($_SERVER['REQUEST_URI']);
        $requestPath = $requestUri['path'];
        $method = $_SERVER['REQUEST_METHOD'];

        $callback = null;

        foreach ($this->handlers as $handler)
        {
            if ($handler['path'] === $requestPath && $method === $handler['method']) {
                $callback = $handler['handler'];
            }
        }

        if (is_string($callback)) {
            $parts = explode('::', $callback);

            if (is_array($parts)) {
                $className = array_shift($parts);
                $handler = new $className;

                $method = array_shift($parts);
                $callback = [$handler, $method];
            }
        }

        if (!$callback) {
            http_response_code(404);

            if (!empty($this->notFoundHandler)) {
                $callback = $this->notFoundHandler;
            }
        }

        call_user_func_array($callback, [
            array_merge($_GET, $_POST)
        ]);
    }
}