<?php

namespace Thomsult\LaravelMapbox\Requests\Options;

use Thomsult\LaravelMapbox\Interfaces\MapboxOptionsInterface;

/*
 * ForwardGeocodingOptions
 * Represents the options available for a forward geocoding request.
 */

class ForwardGeocodingTextOptions extends AbstractOption implements MapboxOptionsInterface
{

  protected ?string $permanent = null;
  protected ?string $autocomplete = null;
  protected ?string $bbox = null;
  protected ?string $country = null;
  protected ?string $format = null;
  protected ?string $language = null;
  protected ?int $limit = null;
  protected ?string $proximity = null;
  protected ?array $types = null;
  protected ?string $worldview = null;

  public function permanent(bool $value): self
  {
    $this->validate($value, 'permanent', ['required', 'boolean']);
    $this->permanent = $value ? 'true' : 'false';
    return $this;
  }

  public function autocomplete(bool $value): self
  {
    $this->validate($value, 'autocomplete', ['required', 'boolean']);
    $this->autocomplete = $value ? 'true' : 'false';
    return $this;
  }

  public function bbox(string $value): self
  {
    $this->validate($value, 'bbox', ['required', 'string']);
    $this->bbox = $value;
    return $this;
  }

  public function country(string $value): self
  {
    $this->validate($value, 'country', ['required', 'string']);
    $this->country = $value;
    return $this;
  }

  public function format(string $value): self
  {
    $this->validate($value, 'format', ['required', 'string']);
    $this->format = $value;
    return $this;
  }

  public function limit(string $value): self
  {
    $this->validate($value, 'limit', ['required', 'integer', 'min:1', 'max:50']);
    $this->limit = $value;
    return $this;
  }

  public function proximity(string $value): self
  {
    $this->validate($value, 'proximity', ['required', 'string']);
    $this->proximity = $value;
    return $this;
  }

  public function types(array $value): self
  {
    $this->validate($value, 'types', ['required', 'array']);
    $this->types = $value;
    return $this;
  }

  public function worldview(string $value): self
  {
    $this->validate($value, 'worldview', ['required', 'string', 'in:ar,cn,in,jp,ma,rs,ru,tr,us']);
    $this->worldview = $value;
    return $this;
  }
}
