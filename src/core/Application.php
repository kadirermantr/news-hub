<?php

namespace Core;

use App\Exceptions\ServiceUnavailableException;
use Exception;

class Application
{
    public Router $router;
    public Request $request;
    public Controller $controller;
    public static Application $app;

    public function __construct()
    {
        Session::init();
        self::$app = $this;

        $this->request = new Request();
        $this->router = new Router($this->request);
    }

    public function run()
    {
        try {
            echo $this->router->resolve();
        } catch(Exception $e) {
            $message = $e->getMessage();
            $code = $e->getCode();

            http_response_code($code);
            echo $this->router->view("_error", "HTTP Error | $code", compact('message', 'code'));
        }
     }

    public function getController(): Controller
    {
        return $this->controller;
    }

    public function setController(Controller $controller): void
    {
        $this->controller = $controller;
    }
}