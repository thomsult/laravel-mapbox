<?php

namespace Thomsult\LaravelMapbox\Requests;

use Thomsult\LaravelMapbox\Requests\Options\ForwardOptions;
use Thomsult\LaravelMapbox\Requests\Options\SearchOptions;

/**
 * ForwardRequest
 * Represents a forward request to the Mapbox API.
 * URL : https://docs.mapbox.com/api/search/search-box/#get-suggested-results
 */
class ForwardRequest extends AbstractRequest
{
  public function __construct(
    string $query,
    ?ForwardOptions $options = null
  ) {
    parent::__construct($query, $options ? $options->toArray() : null);
  }
}
