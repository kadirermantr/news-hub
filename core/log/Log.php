<?php

namespace Core\log;

use App\Models\User;
use Core\DB;

class Log implements LoggerInterface
{
    public function emergency($message, array $context = array())
    {
        $this->log(LogLevel::EMERGENCY, $message, $context);
    }

    public function alert($message, array $context = array())
    {
        $this->log(LogLevel::ALERT, $message);
    }

    public function critical($message, array $context = array())
    {
        $this->log(LogLevel::CRITICAL, $message);
    }

    public function error($message, array $context = array())
    {
        $this->log(LogLevel::ERROR, $message);
    }

    public function warning($message, array $context = array())
    {
        $this->log(LogLevel::WARNING, $message);
    }

    public function notice($message, array $context = array())
    {
        $this->log(LogLevel::NOTICE, $message);
    }

    public function info($message, array $context = array())
    {
        $this->log(LogLevel::INFO, $message);
    }

    public function debug($message, array $context = array())
    {
        $this->log(LogLevel::DEBUG, $message);
    }

    public function log($level, $message, array $context = array())
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
