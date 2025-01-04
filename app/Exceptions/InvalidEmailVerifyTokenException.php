<?php

namespace App\Exceptions;

use Exception;
use App\Traits\RenderToJson;

class InvalidEmailVerifyTokenException extends Exception
{
    use RenderToJson;
    protected $message = 'Token is invalid';
    protected $code = 400;
}
