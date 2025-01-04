<?php

namespace App\Exceptions;

use Exception;
use App\Traits\RenderToJson;

class TeamDoesntExistException extends Exception
{
    use RenderToJson;
    protected $message = 'Team doesn\'t exist';
    protected $code = 400;
}
