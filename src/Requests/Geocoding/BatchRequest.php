<?php

namespace Thomsult\LaravelMapbox\Requests\Geocoding;

use Thomsult\LaravelMapbox\Requests\AbstractRequest;
use Thomsult\LaravelMapbox\Requests\Options\BatchOptions;
use Thomsult\LaravelMapbox\Requests\Options\ReverseGeocodingOptions;
use Thomsult\LaravelMapbox\Requests\Options\SearchOptions;

/**
 * ReverseRequest
 * Represents a reverse geocoding request to the Mapbox API.
 * URL : https://docs.mapbox.com/api/search/search-box/#reverse-lookup
 */
class BatchRequest extends AbstractRequest
{


  public function options(?callable $builder = null): self
  {
    $this->options = $builder ? $builder(new BatchOptions()) : null;
    return $this;
  }
  public function getQuery(): array
  {
    return [];
  }
  public function getBody(): array
  {
    return  $this->body->toArray();
  }
}
