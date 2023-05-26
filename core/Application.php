<?php

namespace Core;

use App\Exceptions\ServiceUnavailableException;
use App\Models\Category;
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

            if (is_int($code)) {
                http_response_code($code);
            }

            $categories = Category::all();
            echo $this->router->view("_error", "Error | $code", compact('message', 'code', 'categories'));
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
