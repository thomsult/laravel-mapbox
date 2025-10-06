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
  protected ?string $limit = null;
  protected ?string $proximity = null;
  protected ?string $types = null;
  protected ?string $worldview = null;

  public function permanent(bool $value): self
  {
    $this->permanent = $value ? 'true' : 'false';
    return $this;
  }

  public function autocomplete(bool $value): self
  {
    $this->autocomplete = $value ? 'true' : 'false';
    return $this;
  }

  public function bbox(string $value): self
  {
    $this->bbox = $value;
    return $this;
  }

  public function country(string $value): self
  {
    $this->country = $value;
    return $this;
  }

  public function format(string $value): self
  {
    $this->format = $value;
    return $this;
  }

  public function language(string $value): self
  {
    $this->language = $value;
    return $this;
  }

  public function limit(string $value): self
  {
    $this->limit = $value;
    return $this;
  }

  public function proximity(string $value): self
  {
    $this->proximity = $value;
    return $this;
  }

  public function types(string $value): self
  {
    $this->types = $value;
    return $this;
  }

  public function worldview(string $value): self
  {
    $this->worldview = $value;
    return $this;
  }
}
