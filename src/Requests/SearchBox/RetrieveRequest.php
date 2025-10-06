<?php

namespace Thomsult\LaravelMapbox\Requests\SearchBox;

use Thomsult\LaravelMapbox\Requests\AbstractRequest;

use Thomsult\LaravelMapbox\Requests\Options\RetrieveOptions;

/**
 * SearchRequest
 * Represents a search request to the Mapbox API.
 * URL : https://docs.mapbox.com/api/search/search-box/#retrieve-a-suggested-feature
 */
class RetrieveRequest extends AbstractRequest
{
  protected string $id = '';

  public function getId(): ?string
  {
    return $this->id;
  }
  public function id(string $id): self
  {
    $this->id = $id;
    return $this;
  }
  public function getUri(): string
  {
    return $this->uri . $this->id;
  }
  public function options(?callable $builder = null): self
  {
    $this->options = $builder ? $builder(new RetrieveOptions()) : null;
    return $this;
  }
}
