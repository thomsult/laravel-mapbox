<?php

namespace Thomsult\LaravelMapbox\Requests\Options;

use Thomsult\LaravelMapbox\Enums\PlaceType;
use Thomsult\LaravelMapbox\Interfaces\MapboxOptionsInterface;

/*
 * RetrieveOptions
 * Represents the options available for a reverse request.
 */

class ReverseGeocodingOptions extends AbstractOption implements MapboxOptionsInterface
{

  protected ?bool $permanent = null;
  protected ?string $language = null;
  protected ?int $limit = null;
  protected ?string $country = null;
  protected ?array $types = null;
  protected ?string $worldview = null;


  public function permanent(bool $permanent): self
  {
    $this->validate($permanent, 'permanent', ['required', 'boolean']);
    $this->permanent = $permanent ? 'true' : 'false';
    return $this;
  }
  public function limit(int $limit): self
  {
    $this->validate($limit, 'limit', ['required', 'integer', 'min:1', 'max:5']);
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
  public function worldview(string $worldview): self
  {
    $this->validate($worldview, 'worldview', ['required', 'string', 'in:ar,cn,in,jp,ma,rs,ru,tr,us']);
    $this->worldview = $worldview;
    return $this;
  }
}
