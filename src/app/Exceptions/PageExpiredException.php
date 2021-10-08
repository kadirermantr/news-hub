<?php

namespace App\Exceptions;

use Exception;

class PageExpiredException extends Exception
{
    protected $message = "Üzgünüz, oturumunuzun süresi doldu.";
    protected $code = 419;
}