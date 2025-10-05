<?php

namespace Thomsult\LaravelMapbox\Requests;

use Thomsult\LaravelMapbox\Requests\AbstractRequest;
use Thomsult\LaravelMapbox\Requests\Options\SearchOptions;

/**
 * SearchRequest
 * Represents a search request to the Mapbox API.
 * URL : https://docs.mapbox.com/api/search/search-box/#get-suggested-results
 */
class SearchRequest extends AbstractRequest
{

  public function options(?callable $builder = null): self
  {
    $this->options = $builder ? $builder(new SearchOptions()) : null;
    return $this;
  }
}
