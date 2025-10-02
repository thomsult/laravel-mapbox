<?php

namespace Thomsult\LaravelMapbox\Services;

use Thomsult\LaravelMapbox\Exceptions\MapboxException;
use Illuminate\Support\Str;
use Thomsult\LaravelMapbox\Interfaces\MapboxClientInterface;
use Thomsult\LaravelMapbox\Interfaces\MapboxApiInterface;

class MapboxClient implements MapboxClientInterface
{

  public static function client(): MapboxApiInterface
  {
    if (!config('mapbox.access_token')) {
      throw new MapboxException('Mapbox access token is not configured.');
    }
    return new MapboxApi(
      (string) Str::uuid(),
      config('mapbox.access_token'),
      config('mapbox.search.base_endpoint') . config('mapbox.api_version'),
      [
        'base_uri' => 'https://api.mapbox.com/',
      ]
    );
  }
}
