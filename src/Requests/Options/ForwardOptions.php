<?php

namespace Thomsult\LaravelMapbox\Requests\Options;

use Thomsult\LaravelMapbox\Interfaces\MapboxOptionsInterface;

/*
 * ForwardOptions
 * Represents the options available for a forward request.
 */

class ForwardOptions extends AbstractOption implements MapboxOptionsInterface
{
  protected ?string $proximity = null;
  protected ?string $bbox = null;
  protected ?string $country = null;
  protected ?array $types = null;
  protected ?string $poi_category = null;
  protected ?string $poi_category_exclusions = null;
  protected ?bool $auto_complete = null;
  protected ?string $eta_type = null;
  protected ?string $navigation_profile = null;
  protected ?string $origin = null;

  public function proximity(string $proximity): self
  {
    $this->validate($proximity, 'proximity', ['required', 'string']);
    $this->proximity = $proximity;
    return $this;
  }
  public function bbox(string $bbox): self
  {
    $this->validate($bbox, 'bbox', ['required', 'string']);
    $this->bbox = $bbox;
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
  public function poiCategory(string $poiCategory): self
  {
    $this->validate($poiCategory, 'poi_category', ['required', 'string']);
    $this->poi_category = $poiCategory;
    return $this;
  }
  public function poiCategoryExclusions(string $poiCategoryExclusions): self
  {
    $this->validate($poiCategoryExclusions, 'poi_category_exclusions', ['required', 'string']);
    $this->poi_category_exclusions = $poiCategoryExclusions;
    return $this;
  }
  public function autoComplete(bool $autoComplete): self
  {
    $this->validate($autoComplete, 'auto_complete', ['required', 'boolean']);
    $this->auto_complete = $autoComplete;
    return $this;
  }
  public function etaType(string $etaType): self
  {
    $this->validate($etaType, 'eta_type', ['required', 'string']);
    $this->eta_type = $etaType;
    return $this;
  }
  public function navigationProfile(string $navigationProfile): self
  {
    $this->validate($navigationProfile, 'navigation_profile', ['required', 'string']);
    $this->navigation_profile = $navigationProfile;
    return $this;
  }
  public function origin(string $origin): self
  {
    $this->validate($origin, 'origin', ['required', 'string']);
    $this->origin = $origin;
    return $this;
  }
}
