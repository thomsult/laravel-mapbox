<?php

namespace Thomsult\LaravelMapbox\Request;

use Thomsult\LaravelMapbox\Request\Options\CategoryOptions;

/**
 * SearchRequest
 * Represents a search request to the Mapbox API.
 * URL : https://docs.mapbox.com/api/search/search-box/#retrieve-a-suggested-feature
 */
class CategoryRequest extends AbstractRequest
{
  public function __construct(
    public string $id,
    ?CategoryOptions  $options = null
  ) {
    parent::__construct(null, $options ? $options->toArray() : null);
  }

  public function getId(): ?string
  {
    return $this->id;
  }
}
