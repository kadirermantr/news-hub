<?php

namespace Core;

class Application
{
    public Router $router;
    public Request $request;
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
        echo $this->router->resolve();
    }
}