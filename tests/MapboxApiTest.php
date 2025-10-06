<?php

use Tests\TestCase;
use Thomsult\LaravelMapbox\Builder\UrlBuilder;
use Thomsult\LaravelMapbox\Services\MapboxApi;
use Illuminate\Support\Str;

uses(TestCase::class)->in(__DIR__);


test('it has correct access token configured', function () {
    expect(config('mapbox.access_token'))->not->toBeEmpty();
});

test('it has correct base uri', function () {
    expect(config('mapbox.base_uri'))->toBe('https://api.mapbox.com/');
});

test('it can access configuration', function () {
    $config = config('mapbox');

    expect($config)->toBeArray()
        ->toHaveKeys(['access_token', 'search', 'geocoding', 'cache', 'rate']);
});

test('search configuration is correct', function () {
    $search = config('mapbox.search');

    expect($search)
        ->toHaveKey('api_version', 'v1/')
        ->toHaveKey('forward_endpoint', 'forward')
        ->toHaveKey('suggest_endpoint', 'suggest');
});

test('geocoding configuration is correct', function () {
    $geocoding = config('mapbox.geocoding');

    expect($geocoding)
        ->toHaveKey('api_version', 'v6/')
        ->toHaveKey('forward_endpoint', 'forward')
        ->toHaveKey('reverse_endpoint', 'reverse');
});

test('MapboxApi can be instantiated', function () {
    $mapbox = app(MapboxApi::class, [
        'session_token' => (string) Str::uuid(),
        'access_token' => config('mapbox.access_token'),
        'url_builder' => new UrlBuilder()
    ]);

    expect($mapbox)->toBeInstanceOf(MapboxApi::class);
});
