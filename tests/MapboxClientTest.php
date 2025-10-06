<?php

use Thomsult\LaravelMapbox\Services\MapboxClient;

test('MapboxClient can be instantiated', function () {
    $client = new MapboxClient();
    expect($client)->toBeInstanceOf(MapboxClient::class);
});
