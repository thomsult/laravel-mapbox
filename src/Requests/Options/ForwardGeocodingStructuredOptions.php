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
    $this->validate($value, 'address_line1', ['required', 'string']);
    $this->address_line1 = $value;
    return $this;
  }

  public function addressNumber(string $value): self
  {
    $this->validate($value, 'address_number', ['required', 'string']);
    $this->address_number = $value;
    return $this;
  }

  public function street(string $value): self
  {
    $this->validate($value, 'street', ['required', 'string']);
    $this->street = $value;
    return $this;
  }

  public function block(string $value): self
  {
    $this->validate($value, 'block', ['required', 'string']);
    $this->block = $value;
    return $this;
  }

  public function place(string $value): self
  {
    $this->validate($value, 'place', ['required', 'string']);
    $this->place = $value;
    return $this;
  }

  public function region(string $value): self
  {
    $this->validate($value, 'region', ['required', 'string']);
    $this->region = $value;
    return $this;
  }

  public function postcode(string $value): self
  {
    $this->validate($value, 'postcode', ['required', 'string']);
    $this->postcode = $value;
    return $this;
  }

  public function locality(string $value): self
  {
    $this->validate($value, 'locality', ['required', 'string']);
    $this->locality = $value;
    return $this;
  }

  public function neighborhood(string $value): self
  {
    $this->validate($value, 'neighborhood', ['required', 'string']);
    $this->neighborhood = $value;
    return $this;
  }

  public function country(string $value): self
  {
    $this->validate($value, 'country', ['required', 'string']);
    $this->country = $value;
    return $this;
  }

  // Optional parameters
  protected ?string $permanent = null;
  protected ?string $autocomplete = null;
  protected ?string $bbox = null;
  protected ?string $format = null;
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
  public function format(string $value): self
  {
    $this->validate($value, 'format', ['required', 'string']);
    $this->format = $value;
    return $this;
  }
  public function limit(int $value): self
  {
    $this->validate($value, 'limit', ['required', 'integer', 'min:1', 'max:10']);
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
