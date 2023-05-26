<?php

namespace Core;

class Session
{
    public static function init(): void
	{
        session_start();
    }

    public static function add($key, $value): void
	{
        $_SESSION[$key] = $value;
    }

    public static function get($key)
    {
        return !empty($_SESSION[$key]) ? $_SESSION[$key] : null;
    }

    public static function getAll()
    {
        return $_SESSION;
    }

    public static function remove($key)
    {
        if(!empty($_SESSION[$key]))
            unset($_SESSION[$key]);
    }

    public static function close(): void
	{
        session_destroy();
    }

    public static function getStatus(): int
	{
        return session_status();
    }
}
