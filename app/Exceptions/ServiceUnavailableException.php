<?php

namespace App\Exceptions;

use Exception;

class ServiceUnavailableException extends Exception
{
    protected $message = "Website is under maintenance. Please try again later.";
    protected $code = 503;
}
