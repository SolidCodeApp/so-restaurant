<?php

return [
    'apiPrefix' => 'so-api', 
    // The prefix for all your API routes.
    // Can be changed to match your application’s API convention.

    'middlewares' => 'web', 
    // Default middleware applied to all routes.
    // Can be replaced with 'api', 'auth:sanctum', or any custom middleware.

    'rateLimiter' => 60, 
    // Limits the number of requests per minute.
    // Optional: change value or disable by setting to null.

    'apiFile' => 'routes/api.php', 
    // Main API routes file for your domain.
    // Can be replaced with another file if you have a different structure.

    'additionals' => [
        [
            'middlewares' => 'web', 
            // Middleware for additional routes, can be customized.
            
            'apiFile' => 'routes/web.php' 
            // Additional routes file, optional.
            // Can be removed if not needed.
        ],
    ]
];