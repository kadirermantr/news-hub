<?php

namespace Core;

class Request
{
    private array $array;

    public function __construct()
    {
        $this->array = array_merge($_GET, $_POST, $_FILES);
    }

    public function get($key)
    {
        return $this->array[$key] ?? null;
    }

    public function set($key, $value): void
	{
        $this->array[$key] = $value;
    }

    public function merge(array $array): void
	{
        $this->array = array_merge($this->array, $array);
    }

    public function all(): array
	{
        return $this->array;
    }

    public function getPath()
    {
        $path = $_SERVER['REQUEST_URI'] ?? '/';
        $position = strpos($path, '?');

        if ($position === false) {
            return $path;
        }

        return substr($path, 0, $position);
    }

    public function method(): string
	{
        return strtolower($_SERVER['REQUEST_METHOD']);
    }

    public function getBody(): array
	{
        $body = [];

        if ($this->method() === 'get') {
            foreach ($_GET as $key => $value) {
                $body[$key] = test_input(filter_input(INPUT_GET, $key, FILTER_SANITIZE_SPECIAL_CHARS));
            }
        }

        if ($this->method() === 'post') {
            foreach ($_POST as $key => $value) {
                $body[$key] = test_input(filter_input(INPUT_POST, $key, FILTER_SANITIZE_SPECIAL_CHARS));
            }
        }

        return $body;
    }
}
