<?php

namespace Thomsult\LaravelMapbox\Requests\SearchBox;

use Illuminate\Support\Facades\Validator;
use Thomsult\LaravelMapbox\Requests\AbstractRequest;
use Thomsult\LaravelMapbox\Requests\Options\CategoryOptions;

/**
 * SearchRequest
 * Represents a search request to the Mapbox API.
 * URL : https://docs.mapbox.com/api/search/search-box/#retrieve-a-suggested-feature
 */
class CategoryRequest extends AbstractRequest
{
  protected string $id = '';

  public function getId(): ?string
  {
    return $this->id;
  }
  public function id(string $id): self
  {
    $validator = Validator::make(['id' => $id], [
      'id' => ['required', 'string']
    ]);

    if ($validator->fails()) {
      throw new \InvalidArgumentException($validator->errors());
    }

    $this->id = $id;
    return $this;
  }
  public function getUri(): string
  {
    return $this->uri . $this->id;
  }
  public function options(?callable $builder = null): self
  {
    $this->options = $builder ? $builder(new CategoryOptions()) : null;
    return $this;
  }
}
