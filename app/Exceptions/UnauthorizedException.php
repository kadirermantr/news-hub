<?php

namespace App\Exceptions;

use Exception;

class UnauthorizedException extends Exception
{
    protected $message = "You don't have permission to access this page.";
    protected $code = 401;
}
