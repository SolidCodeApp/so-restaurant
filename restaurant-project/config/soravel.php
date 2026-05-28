<?php

return [
    'DOMAINS_DIRECTORY' => 'Domains', 
    // The folder where all your domains are stored.
    // Can be renamed if you organize your domains differently.

    'MAX_QUERY_RECORDS' => 1000, 
    // Maximum number of records returned by query.
    // Can be adjusted depending on your app’s needs.

    'DEBUG_ENABLED' => true, 
    // Enables debug mode for SoRavel.
    // Can be set to false in production.

    'EXPORT_ENABLED' => true, 
    // Enables export functionality globally.
    // Can be set to false if you don’t need export features.


    'TENANT_CLASS' => null, 
    // Optional: The class representing the Tenant entity.
    // Needed for multi-tenancy support.

    'UPDATE_SNAPSHOT_CLASS' => null, 
    // Optional: Class to snapshot updated records.
    // Can be null if not using update snapshots.

    'LOG_MASK_KEYS' => [
        'email',
        'mail',
        'password', 
        'pass', 
        'code', 
        'phone',
        'token',
        'remember_token',
        'authorization'
    ],
    // Keys that will be masked in logs to protect sensitive data.
    // Can be customized to match your app’s sensitive fields.

    /*
    |--------------------------------------------------------------------------
    | OBSERVABILITY
    |--------------------------------------------------------------------------
    | Automatically logs listed items.
    | If present in the array => activated.
    | Can be deactivated by adding an exclamation mark before the value like '!sql'.
    */
    'OBSERVABILITY' => [
        'sql',            // Logs SQL queries
        'api',            // Logs API requests/responses
        'description',    // Logs descriptions of actions
        'stream',         // Logs streaming actions
        'route',          // Logs route calls
        'context',        // Add context to each log
        'logic_exception',// Logs developer errors
        'user_exception', // Logs user-facing exceptions
    ],
    // You can remove or add observability types depending on what you need to log.
];