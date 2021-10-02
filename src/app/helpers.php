<?php

function publicPath(?string $path = null)
{
    $env = parse_ini_file(__DIR__ . '/../.env');
    return $env['APP_URL'] . $path;
}

function view($view, array $data = [])
{
    require_once __DIR__ . "/views/".$view.".php";

    return $data;
}