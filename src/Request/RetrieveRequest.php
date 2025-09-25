<?php

namespace Thomsult\LaravelMapbox\Request;

use Thomsult\LaravelMapbox\Request\Options\RetrieveOptions;

/**
 * SearchRequest
 * Represents a search request to the Mapbox API.
 * URL : https://docs.mapbox.com/api/search/search-box/#retrieve-a-suggested-feature
 */
class RetrieveRequest
{
  public function __construct(
    private string $id,
    private ?RetrieveOptions  $options = null
  ) {}

  public function getId(): string
  {
    return $this->id;
  }

  public function getOptions(): ?array
  {
    return $this->options?->toArray() ?? null;
  }

}
