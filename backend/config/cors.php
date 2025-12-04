<?php
return [
    'paths' => ['api/*', 'sanctum/csrf-cookie', 'sse/*'],

    'allowed_methods' => ['*'],

    // During development allow all origins to simplify debugging (including
    // file:// or other dev servers). In production replace with specific
    // origins or use the environment variable approach.
    'allowed_origins' => ['http://localhost:3000'],

    'allowed_headers' => ['*'],

    // Expose Authorization so frontend can read it if needed
    'exposed_headers' => ['Content-Type', 'Authorization'],

    'max_age' => 0,

    // For a wildcard origin we must disable credentials. If you need cookies
    // or Authorization via cookies, set this to true and list specific origins
    // instead of '*'.
    'supports_credentials' => true,
];
