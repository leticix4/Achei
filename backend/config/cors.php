<?php
return [
    'paths' => ['api/*', 'sanctum/csrf-cookie', 'sse/*'],

    'allowed_methods' => ['*'],

    'Access-Control-Allow-Origin' => ['*'],

    'allowed_headers' => ['*'],

    'exposed_headers' => ['Content-Type'],

    'max_age' => 0,

    'supports_credentials' => true,
];
