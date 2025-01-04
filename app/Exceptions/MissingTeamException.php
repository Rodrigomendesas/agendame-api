<?php

namespace App\Exceptions;

use Exception;
use App\Traits\RenderToJson;

class MissingTeamException extends Exception
{
    use RenderToJson;
    protected $message = 'Team ID is missing in the header';
    protected $code = 400;
}
