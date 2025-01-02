<?php

namespace App\Exceptions;

use Exception;
use App\Traits\RenderToJson;

class UserAlreadyVerifiedException extends Exception
{
    use RenderToJson;
    protected $message = 'User already verified';
    protected $code = 400;
}
