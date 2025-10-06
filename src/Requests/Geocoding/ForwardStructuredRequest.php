<?php

namespace Thomsult\LaravelMapbox\Requests\Geocoding;

use Thomsult\LaravelMapbox\Requests\AbstractRequest;
use Thomsult\LaravelMapbox\Requests\Options\ForwardGeocodingStructuredOptions;
use Thomsult\LaravelMapbox\Requests\Options\ForwardOptions;
use Thomsult\LaravelMapbox\Requests\Options\SearchOptions;
use Thomsult\LaravelMapbox\Traits\BatchRequestTrait;

/**
 * ForwardStructuredRequest
 * Represents a forward structured request to the Mapbox API.
 * URL : https://docs.mapbox.com/api/search/search-box/#get-suggested-results
 */
class ForwardStructuredRequest extends AbstractRequest
{
  use BatchRequestTrait;
  public function options(?callable $builder = null): self
  {
    $this->options = $builder ? $builder(new ForwardGeocodingStructuredOptions()) : null;
    return $this;
  }
  public function getQuery(): array
  {
    return [];
  }
}
