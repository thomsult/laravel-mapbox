<?php

namespace Thomsult\LaravelMapbox\Requests\Options;

use Thomsult\LaravelMapbox\Enums\PlaceType;
use Thomsult\LaravelMapbox\Interfaces\MapboxOptionsInterface;

/*
 * RetrieveOptions
 * Represents the options available for a reverse request.
 */

class ReverseOptions extends AbstractOption implements MapboxOptionsInterface
{

  protected ?string $language = null;
  protected ?int $limit = null;
  protected ?string $country = null;
  protected ?string $types = null;


  public function language(string $language): self
  {
    $this->language = $language;
    return $this;
  }
  public function limit(int $limit): self
  {
    $this->limit = $limit;
    return $this;
  }
  public function country(string $country): self
  {
    $this->country = $country;
    return $this;
  }
  public function types(string $types): self
  {
    $this->types = $types;
    return $this;
  }
}
