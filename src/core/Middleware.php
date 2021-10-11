<?php

namespace Core;

use Closure;

abstract class Middleware
{
    abstract public function execute();
}