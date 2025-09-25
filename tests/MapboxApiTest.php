<?php

use Thomsult\LaravelMapbox\Services\MapboxApi;

test('MapboxApi can be instantiated', function () {
    $api = new MapboxApi('session_token', 'access_token', 'https://api.mapbox.com');
    expect($api)->toBeInstanceOf(MapboxApi::class);
});
