<?php

use Thomsult\LaravelMapbox\Builder\UrlBuilder;
use Thomsult\LaravelMapbox\Services\MapboxApi;

test('MapboxApi can be instantiated', function () {
    $api = new MapboxApi('session_token', 'access_token', new UrlBuilder());
    expect($api)->toBeInstanceOf(MapboxApi::class);
});
