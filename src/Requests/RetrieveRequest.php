<?php

namespace Thomsult\LaravelMapbox\Requests;

use Thomsult\LaravelMapbox\Requests\Options\RetrieveOptions;

/**
 * SearchRequest
 * Represents a search request to the Mapbox API.
 * URL : https://docs.mapbox.com/api/search/search-box/#retrieve-a-suggested-feature
 */
class RetrieveRequest extends AbstractRequest
{
  public function __construct(
    public string $id,
    ?RetrieveOptions  $options = null
  ) {
    parent::__construct(null, $options ? $options->toArray() : null);
  }

  public function getId(): ?string
  {
    return $this->id;
  }
}
