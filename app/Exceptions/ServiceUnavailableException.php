<?php

namespace App\Exceptions;

use Exception;

class ServiceUnavailableException extends Exception
{
    protected $message = "Üzgünüz, web sitesi bakım modunda.";
    protected $code = 503;
}