<?php

namespace Thomsult\LaravelMapbox\Requests\SearchBox;

use Thomsult\LaravelMapbox\Requests\AbstractRequest;

use Thomsult\LaravelMapbox\Requests\Options\ForwardOptions;
use Thomsult\LaravelMapbox\Requests\Options\SearchOptions;

/**
 * ForwardRequest
 * Represents a forward request to the Mapbox API.
 * URL : https://docs.mapbox.com/api/search/search-box/#get-suggested-results
 */
class ForwardRequest extends AbstractRequest
{
  public function options(?callable $builder = null): static
  {
    $this->options = $builder ? $builder(new ForwardOptions()) : null;
    return $this;
  }
}
