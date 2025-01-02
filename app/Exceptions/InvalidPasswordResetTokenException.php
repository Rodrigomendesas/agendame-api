<?php

namespace App\Exceptions;

use Exception;
use App\Traits\RenderToJson;

class InvalidPasswordResetTokenException extends Exception
{
    use RenderToJson;
    protected $message = 'Invalid password reset token';
    protected $code = 400;
}
