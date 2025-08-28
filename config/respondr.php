<?php

return [

    /*
    |--------------------------------------------------------------------------
    | API Response Keys
    |--------------------------------------------------------------------------
    |
    | Hier kannst du die Standard-Keys für alle API Responses anpassen.
    | Zum Beispiel: status, data, message, errors.
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
    | Standard-Status, der für erfolgreiche Responses verwendet wird.
    |
    */

    'default_status' => 'success',
];
