<?php

namespace Core\log;

use App\Models\User;
use Core\DB;

class Log implements LoggerInterface
{
    public function emergency(string $message, array $context = array()): void
	{
        $this->log(LogLevel::EMERGENCY, $message, $context);
    }

    public function alert(string $message, array $context = array()): void
	{
        $this->log(LogLevel::ALERT, $message);
    }

    public function critical(string $message, array $context = array()): void
	{
        $this->log(LogLevel::CRITICAL, $message);
    }

    public function error(string $message, array $context = array()): void
	{
        $this->log(LogLevel::ERROR, $message);
    }

    public function warning(string $message, array $context = array()): void
	{
        $this->log(LogLevel::WARNING, $message);
    }

    public function notice(string $message, array $context = array()): void
	{
        $this->log(LogLevel::NOTICE, $message);
    }

    public function info(string $message, array $context = array()): void
	{
        $this->log(LogLevel::INFO, $message);
    }

    public function debug(string $message, array $context = array()): void
	{
        $this->log(LogLevel::DEBUG, $message);
    }

    public function log(mixed $level, string $message, array $context = array()): void
	{
        $directory = __DIR__ . '/../../storage/logs/app.log';

        if (isGuest()) {
            $user = "Anonym user";
            $role = null;
        } else {
            if ($context[0] ?? true != false) {
                $user = "user number: " . user('id');
                $role = User::getRole(user('role_level'));
            } else {
                $user = 'Unknown';
                $role = 'Unknown';
            }
        }

        $log_message = date('Y/m/d G:i:s') . " " . $role . " " . $user . " " . $message . PHP_EOL;
        file_put_contents($directory, $log_message, FILE_APPEND);
    }
}
