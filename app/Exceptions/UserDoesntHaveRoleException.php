<?php

namespace App\Exceptions;

use Exception;
use App\Traits\RenderToJson;

class UserDoesntHaveRoleException extends Exception
{
    use RenderToJson;
    protected $message = 'User doesn\'t have role';
    protected $code = 400;
}
