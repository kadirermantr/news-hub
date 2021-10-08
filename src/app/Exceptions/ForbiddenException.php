<?php

namespace App\Exceptions;

use Exception;

class ForbiddenException extends Exception
{
    protected $message = "Üzgünüz, bu sayfaya erişiminiz yok.";
    protected $code = 401;
}