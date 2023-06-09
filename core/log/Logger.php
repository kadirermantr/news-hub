<?php

namespace Core\log;

class Logger
{
    public static function emergency($message, array $context = array()): void
	{
        $log = new Log();
        $log->emergency($message, $context);
    }

    public static function alert($message, array $context = array()): void
	{
        $log = new Log();
        $log->alert($message);
    }

    public static function critical($message, array $context = array()): void
	{
        $log = new Log();
        $log->critical($message);
    }

    public static function error($message, array $context = array()): void
	{
        $log = new Log();
        $log->error($message);
    }

    public static function warning($message, array $context = array()): void
	{
        $log = new Log();
        $log->warning($message);
    }

    public static function notice($message, array $context = array()): void
	{
        $log = new Log();
        $log->notice($message);
    }

    public static function info($message, array $context = array()): void
	{
        $log = new Log();
        $log->info($message);
    }

    public static function debug($message, array $context = array()): void
	{
        $log = new Log();
        $log->debug($message);
    }
}
