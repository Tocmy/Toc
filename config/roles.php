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

    /*
    |--------------------------------------------------------------------------
    | Roles, Permissions and Allowed "Pretend"
    |--------------------------------------------------------------------------
    |
    | You can pretend or simulate package behavior no matter what is in your
    | database. It is really useful when you are testing you application.
    | Set up what will methods hasRole(), hasPermission() and allowed() return.
    |
    */

    'pretend' => [
        'enabled' => false,
        'options' => [
            'hasRole'       => true,
            'hasPermission' => true,
            'allowed'       => true,
        ],
    ],

];


?>
