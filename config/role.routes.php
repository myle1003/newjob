<?php
return [
    'roles' => [
        'controller' => "RolesController",
        'differences' => [
            [
                'uri' => 'menus/{role_id}',
                'action' => 'RolesController@menus',
                'method' => 'get', //get, post, put , any
                'name' => 'menus',
            ],
            [
                'uri' => 'menus/{role_id}',
                'action' => 'RolesController@handleMenus',
                'method' => 'put',
                'name' => 'handle-menus',
            ]
        ]
    ]
];
