<?php

return [
    'access_token' => env('MAPBOX_ACCESS_TOKEN'),
    'base_uri' => 'https://api.mapbox.com/',
    'api_version' => 'v1/',
    'search' => [
        'base_endpoint' => 'search/searchbox/',
        'forward_endpoint' => 'forward',
        'suggest_endpoint' => 'suggest',
        'retrieve_endpoint' => 'retrieve',
        'category_endpoint' => 'category',
        'category_list_endpoint' => 'list/category',
        'reverse_endpoint' => 'reverse',
    ],
    'cache_ttl' => 3600,
];
