<?php

use Thomsult\LaravelMapbox\Services\MapboxClient;

test('MapboxClient can be instantiated', function () {
    $client = new MapboxClient('fake-token');
    expect($client)->toBeInstanceOf(MapboxClient::class);
});
