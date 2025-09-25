<?php

use Thomsult\LaravelMapbox\Request\RetrieveRequest;

test('RetrieveRequest can be instantiated', function () {
    $request = new RetrieveRequest('place-id');
    expect($request)->toBeInstanceOf(RetrieveRequest::class);
});
