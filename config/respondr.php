<?php

return [
    /*
    |--------------------------------------------------------------------------
    | API Response Keys
    |--------------------------------------------------------------------------
    |
    | Define the keys used in the standardized API responses.
    |
    */

    'format' => [
        'status_key'  => 'status',
        'data_key'    => 'data',
        'message_key' => 'message',
        'errors_key'  => 'errors',
    ],

    /*
    |--------------------------------------------------------------------------
    | Default Status
    |--------------------------------------------------------------------------
    |
    | The default status value used for successful responses.
    |
    */
    'default_status' => 'success',

    /*
    |--------------------------------------------------------------------------
    | API Version Middleware
    |--------------------------------------------------------------------------
    |
    | Enables the middleware that appends the API version to each response.
    |
    */
    'version_middleware' => [
        'enabled' => true,
        'version' => '1.0.0',
        'key' => 'api_version',
    ],
];
