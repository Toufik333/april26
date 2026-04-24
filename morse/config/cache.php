<?php

use Illuminate\Support\Str;

return [
    'default' => env('CACHE_STORE', 'file'),
    'stores' => [
        'array' => [
            'driver' => 'array',
            'serialize' => false,
        ],
        'database' => [
            'driver' => 'database',
            'table' => env('DB_CACHE_TABLE', 'cache'),
            'connection' => env('DB_CACHE_CONNECTION'),
            'lock_connection' => env('DB_CACHE_LOCK_CONNECTION'),
            'lock_table' => env('DB_CACHE_LOCK_TABLE'),
        ],
        'file' => [
            'driver' => 'file',
            'path' => storage_path('framework/cache/data'),
        ],
        'memcached' => [
            'driver' => 'memcached',
            'persistent_id' => env('MEMCACHED_PERSISTENT_ID'),
            'sasl' => [
                env('MEMCACHED_USERNAME'),
                env('MEMCACHED_PASSWORD'),
            ],
            'options' => [],
        ],
        'redis' => [
            'driver' => 'redis',
            'connection' => env('CACHE_CONNECTION', 'cache'),
        ],
    ],
    'prefix' => env('CACHE_PREFIX', Str::slug((string) env('APP_NAME', 'laravel'), '_').'_cache'),
];