<?php

namespace App\Exceptions;

use Exception;
use App\Traits\RenderToJson;

class UserHasBeenTakenException extends Exception
{
    use RenderToJson;
    protected $message = 'This user already exists';
    protected $code = 401;
}
