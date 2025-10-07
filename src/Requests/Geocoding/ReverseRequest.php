<?php

namespace Thomsult\LaravelMapbox\Requests\Geocoding;

use Thomsult\LaravelMapbox\Requests\AbstractRequest;

use Thomsult\LaravelMapbox\Requests\Options\ReverseGeocodingOptions;
use Thomsult\LaravelMapbox\Requests\Options\SearchOptions;
use Thomsult\LaravelMapbox\Traits\BatchRequestTrait;

/**
 * ReverseRequest
 * Represents a reverse geocoding request to the Mapbox API.
 * URL : https://docs.mapbox.com/api/search/search-box/#reverse-lookup
 */
class ReverseRequest extends AbstractRequest
{
  use BatchRequestTrait;
  protected float $longitude;
  protected float $latitude;

  public function options(?callable $builder = null): static
  {
    $this->options = $builder ? $builder(new ReverseGeocodingOptions()) : null;
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
