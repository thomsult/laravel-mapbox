<?php

namespace Thomsult\LaravelMapbox\Requests;

use Thomsult\LaravelMapbox\Requests\Options\ReverseOptions;
use Thomsult\LaravelMapbox\Requests\Options\SearchOptions;

/**
 * ReverseRequest
 * Represents a reverse geocoding request to the Mapbox API.
 * URL : https://docs.mapbox.com/api/search/search-box/#reverse-lookup
 */
class ReverseRequest
{
  public function __construct(
    private float $longitude,
    private float $latitude,
    private ?ReverseOptions $options
  ) {}

  public function getLongitude(): array
  {
    return ['longitude' => $this->longitude];
  }

  public function getLatitude(): array
  {
    return ['latitude' => $this->latitude];
  }

  public function getOptions(): ?array
  {
    return $this->options?->toArray();
  }
  public function getQuery(): array
  {
    return [
      ...$this->getLongitude(),
      ...$this->getLatitude(),
    ];
  }
}
