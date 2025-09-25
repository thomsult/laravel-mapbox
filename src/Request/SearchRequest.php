<?php

namespace Thomsult\LaravelMapbox\Request;

use Thomsult\LaravelMapbox\Request\Options\SearchOptions;

/**
 * SearchRequest
 * Represents a search request to the Mapbox API.
 * URL : https://docs.mapbox.com/api/search/search-box/#get-suggested-results
 */
class SearchRequest
{
  public function __construct(
    private string $query,
    private ?SearchOptions $options
  ) {}

  public function getQuery(): string
  {
    return $this->query;
  }

  public function getOptions(): ?array
  {
    return $this->options?->toArray() ?? null;
  }
}
