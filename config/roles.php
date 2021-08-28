<?php

return[

    /*
    |--------------------------------------------------------------------------
    | Inheritance
    |--------------------------------------------------------------------------
    |
    | By default, the plugin is configured so that all roles inherit all
    | permissions applied to roles defined at a lower level than the role in
    | question. If this is not desired, setting the below to false will disable
    | this inheritance
    |
    */

    'inheritance' => env('ROLES_INHERITANCE', true),

];


?>
