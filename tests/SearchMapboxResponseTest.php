<?php

use Thomsult\LaravelMapbox\Response\SearchMapboxResponse;

test('SearchMapboxResponse can be instantiated', function () {
    $response = new SearchMapboxResponse(collect(), '', '', 200);
    expect($response)->toBeInstanceOf(SearchMapboxResponse::class);
});
