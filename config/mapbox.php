<?php

return [
    'access_token' => env('MAPBOX_ACCESS_TOKEN'),
    'base_uri' => 'https://api.mapbox.com/',
    'api_version' => 'v1/',
    'search' => [
        'base_endpoint' => 'search/searchbox/',
        'forward_endpoint' => 'forward', //not implements
        'suggest_endpoint' => 'suggest',
        'retrieve_endpoint' => 'retrieve',
        'category_endpoint' => 'category', //not implements
        'list_categories_endpoint' => 'list/category' //not implements
    ],
    'cache_ttl' => 3600,
];
