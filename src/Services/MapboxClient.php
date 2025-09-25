<?php

namespace Thomsult\LaravelMapbox\Services;

use Thomsult\LaravelMapbox\Exceptions\MapboxException;
use Illuminate\Support\Str;

class MapboxClient
{

  public static function client(): MapboxApi
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
