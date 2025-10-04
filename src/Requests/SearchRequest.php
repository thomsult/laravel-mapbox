<?php

namespace Thomsult\LaravelMapbox\Requests;

use Thomsult\LaravelMapbox\Requests\Options\SearchOptions;

/**
 * SearchRequest
 * Represents a search request to the Mapbox API.
 * URL : https://docs.mapbox.com/api/search/search-box/#get-suggested-results
 */
class SearchRequest extends AbstractRequest
{
  public function __construct(
    string $query,
    ?SearchOptions $options
  ) {
    parent::__construct($query, $options ? $options->toArray() : null);
  }
}
