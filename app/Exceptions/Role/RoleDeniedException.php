<?php

namespace App\Exceptions\Role;

use Exception;

class RoleDeniedException extends AccessDeniedException
{
    public function __construct($role)
    {
        $this->message = sprintf("You don't have a required ['%s'] role.", $role);
    }
}
