<?php

use Thomsult\LaravelMapbox\Response\RetrieveMapboxResponse;

test('RetrieveMapboxResponse can be instantiated', function () {
    $response = new RetrieveMapboxResponse(collect(), '', '', 200);
    expect($response)->toBeInstanceOf(RetrieveMapboxResponse::class);
});
