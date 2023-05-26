<?php

namespace App\Exceptions;

use Exception;

class NotFoundException extends Exception
{
    protected $message = "Page not found or has been removed.";
    protected $code = 404;
}
