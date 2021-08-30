<?php

namespace App\Exceptions\Role;

use Exception;

class LevelDeniedException extends AccessDeniedException
{
    public function __construct($level)
    {
          $this->message = sprintf("You don't have a required ['%s'] level", $level);
    }
}
