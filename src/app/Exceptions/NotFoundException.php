<?php

namespace App\Exceptions;

use Exception;

class NotFoundException extends Exception
{
    protected $message = "Üzgünüz, aradığınız sayfa bulunamadı.";
    protected $code = 404;
}