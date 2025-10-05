<?php

namespace Thomsult\LaravelMapbox\Requests;

use Thomsult\LaravelMapbox\Requests\Options\ReverseOptions;
use Thomsult\LaravelMapbox\Requests\Options\SearchOptions;

/**
 * ReverseRequest
 * Represents a reverse geocoding request to the Mapbox API.
 * URL : https://docs.mapbox.com/api/search/search-box/#reverse-lookup
 */
class ReverseRequest extends AbstractRequest
{
  protected float $longitude;
  protected float $latitude;

  public function options(?callable $builder = null): self
  {
    $this->options = $builder ? $builder(new ReverseOptions()) : null;
    return $this;
  }
  public function latitude(float $latitude): self
  {
    $this->latitude = $latitude;
    return $this;
  }
  public function longitude(float $longitude): self
  {
    $this->longitude = $longitude;
    return $this;
  }
  public function getQuery(): array
  {
    return [
      'longitude' => $this->longitude,
      'latitude' => $this->latitude,
    ];
  }
}
