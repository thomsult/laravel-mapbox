<?php

namespace Thomsult\LaravelMapbox\Requests\Options;

use Thomsult\LaravelMapbox\Interfaces\MapboxOptionsInterface;

/*
 * ForwardGeocodingOptions
 * Represents the options available for a forward geocoding request.
 */

class ForwardGeocodingStructuredOptions extends AbstractOption implements MapboxOptionsInterface
{

  protected ?string $address_line1 = null;
  protected ?string $address_number = null;
  protected ?string $street = null;
  protected ?string $block = null;
  protected ?string $place = null;
  protected ?string $region = null;
  protected ?string $postcode = null;
  protected ?string $locality = null;
  protected ?string $neighborhood = null;
  protected ?string $country = null;

  public function addressLine1(string $value): self
  {
    $this->address_line1 = $value;
    return $this;
  }

  public function addressNumber(string $value): self
  {
    $this->address_number = $value;
    return $this;
  }

  public function street(string $value): self
  {
    $this->street = $value;
    return $this;
  }

  public function block(string $value): self
  {
    $this->block = $value;
    return $this;
  }

  public function place(string $value): self
  {
    $this->place = $value;
    return $this;
  }

  public function region(string $value): self
  {
    $this->region = $value;
    return $this;
  }

  public function postcode(string $value): self
  {
    $this->postcode = $value;
    return $this;
  }

  public function locality(string $value): self
  {
    $this->locality = $value;
    return $this;
  }

  public function neighborhood(string $value): self
  {
    $this->neighborhood = $value;
    return $this;
  }

  public function country(string $value): self
  {
    $this->country = $value;
    return $this;
  }

  // Optional parameters
  protected ?string $permanent = null;
  protected ?string $autocomplete = null;
  protected ?string $bbox = null;
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
