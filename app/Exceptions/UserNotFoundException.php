<?php

namespace App\Exceptions;

use Exception;
use App\Traits\RenderToJson;

class UserNotFoundException extends Exception
{
    use RenderToJson;
    protected $message = 'This user does not exist';
    protected $code = 400;
}
