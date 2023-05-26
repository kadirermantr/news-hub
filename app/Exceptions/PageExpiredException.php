<?php

namespace App\Exceptions;

use Exception;

class PageExpiredException extends Exception
{
    protected $message = "Page has expired. Please try again.";
    protected $code = 419;
}
