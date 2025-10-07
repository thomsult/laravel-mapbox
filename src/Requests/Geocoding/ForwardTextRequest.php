<?php

namespace Thomsult\LaravelMapbox\Requests\Geocoding;

use Thomsult\LaravelMapbox\Requests\AbstractRequest;
use Thomsult\LaravelMapbox\Requests\Options\ForwardGeocodingTextOptions;
use Thomsult\LaravelMapbox\Requests\Options\ForwardOptions;
use Thomsult\LaravelMapbox\Requests\Options\SearchOptions;
use Thomsult\LaravelMapbox\Traits\BatchRequestTrait;

/**
 * ForwardTextRequest
 * Represents a forward text request to the Mapbox API.
 * URL : https://docs.mapbox.com/api/search/search-box/#get-suggested-results
 */
class ForwardTextRequest extends AbstractRequest
{
  use BatchRequestTrait;
  public function options(?callable $builder = null): static
  {
    $this->options = $builder ? $builder(new ForwardGeocodingTextOptions()) : null;
    return $this;
  }
}
