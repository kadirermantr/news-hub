<?php

namespace App\Exceptions;

use Exception;

class UnauthorizedException extends Exception
{
    protected $message = "Üzgünüz, bu sayfaya erişiminiz yok.";
    protected $code = 401;
}