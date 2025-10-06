<?php

return [
    'access_token' => env('MAPBOX_ACCESS_TOKEN'),
    'base_uri' => 'https://api.mapbox.com/',
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
