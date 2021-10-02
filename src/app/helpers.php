<?php

function publicPath(?string $path = null)
{
    $env = parse_ini_file(__DIR__ . '/../.env');
    echo $env['APP_URL'] . '/' . $path;
}

function view($view, string $title, array $data = [])
{
    require_once __DIR__ . '/views/'.$view.'.php';
}