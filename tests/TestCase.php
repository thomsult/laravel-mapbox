<?php

namespace Thomsult\LaravelMapbox\Tests;

use Orchestra\Testbench\TestCase as Orchestra;
use Thomsult\LaravelMapbox\Providers\MapboxServiceProvider;

abstract class TestCase extends Orchestra
{
  protected function setUp(): void
  {
    parent::setUp();
  }

  protected function getPackageProviders($app)
  {
    return [
      MapboxServiceProvider::class,
    ];
  }

  protected function getEnvironmentSetUp($app)
  {
    // Charger la configuration du package
    $app['config']->set('mapbox', [
      'access_token' => 'test_token_' . bin2hex(random_bytes(16)),
      'base_uri' => 'https://api.mapbox.com/',
      'debug' => false,
      'cache' => [
        'enabled' => false, // Désactiver le cache en test
        'duration' => 15,
        'timeout' => 5
      ],
      'rate' => [
        'enabled' => false, // Désactiver le rate limiting en test
        'limit' => 60,
        'decay' => 60,
      ],
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
    ]);
  }
}
