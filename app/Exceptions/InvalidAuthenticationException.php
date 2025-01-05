<?php

namespace App\Exceptions;

use Exception;
use App\Traits\RenderToJson;

class InvalidAuthenticationException extends Exception
{
    use RenderToJson;
    protected $message = 'Invalid authentication';
    protected $code = 400;
}
