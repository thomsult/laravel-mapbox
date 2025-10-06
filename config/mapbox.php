<?php

return [
    'access_token' => env('MAPBOX_ACCESS_TOKEN'),
    'base_uri' => 'https://api.mapbox.com/',
    'debug' => env('MAPBOX_DEBUG', false),
    'cache' => [
        'enabled' => env('MAPBOX_CACHE_ENABLED', true),
        'duration' => env('MAPBOX_CACHE_DURATION', 15),
        'timeout' => env('MAPBOX_CACHE_TIMEOUT', 5)
    ],
    'rate' => [
        'enabled' => env('MAPBOX_RATE_ENABLED', true),
        'limit' => env('MAPBOX_RATE_LIMIT', 60),
        'decay' => env('MAPBOX_RATE_DECAY', 60),
    ],
    'search' => [
        'api_version' => 'v1/',
        'prefix' => 'search/',
        'base_endpoint' => 'searchbox/',
        'forward_endpoint' => 'forward',
        'suggest_endpoint' => 'suggest',
        'retrieve_endpoint' => 'retrieve',
        'category_endpoint' => 'category',
        'category_list_endpoint' => 'list/category',
        'reverse_endpoint' => 'reverse',
    ],
    'geocoding' => [
        'api_version' => 'v6/',
        'prefix' => 'search/',
        'base_endpoint' => 'geocode/',
        'forward_endpoint' => 'forward',
        'reverse_endpoint' => 'reverse',
        'batch_endpoint' => 'batch'
    ]
];
