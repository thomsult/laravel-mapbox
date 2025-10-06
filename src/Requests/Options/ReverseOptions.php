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

  protected ?int $limit = null;
  protected ?string $country = null;
  protected ?array $types = null;


  public function limit(int $limit): self
  {
    $this->validate($limit, 'limit', ['required', 'integer', 'min:1','max:10']);
    $this->limit = $limit;
    return $this;
  }
  public function country(string $country): self
  {
    $this->validate($country, 'country', ['required', 'string', 'max:2']);
    $this->country = $country;
    return $this;
  }
  public function types(array $types): self
  {
    $this->validate($types, 'types', ['required', 'array']);
    $this->types = $types;
    return $this;
  }
}
