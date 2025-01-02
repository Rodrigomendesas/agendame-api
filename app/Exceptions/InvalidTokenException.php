<?php

namespace App\Exceptions;

use Exception;
use App\Traits\RenderToJson;

class InvalidTokenException extends Exception
{
    use RenderToJson;
    protected $message = 'Token is invalid';
    protected $code = 400;
}
