<?php

namespace Thomsult\LaravelMapbox\Requests\Options;

use Thomsult\LaravelMapbox\Interfaces\MapboxOptionsInterface;

/*
 * ForwardOptions
 * Represents the options available for a forward request.
 */

class ForwardOptions extends AbstractOption implements MapboxOptionsInterface
{
  protected ?string $language = null;
  protected ?string $proximity = null;
  protected ?string $bbox = null;
  protected ?string $country = null;
  protected ?string $types = null;
  protected ?string $poi_category = null;
  protected ?string $poi_category_exclusions = null;
  protected ?bool $auto_complete = null;
  protected ?string $eta_type = null;
  protected ?string $navigation_profile = null;
  protected ?string $origin = null;

  public function language(string $language): self
  {
    $this->language = $language;
    return $this;
  }
  public function proximity(string $proximity): self
  {
    $this->proximity = $proximity;
    return $this;
  }
  public function bbox(string $bbox): self
  {
    $this->bbox = $bbox;
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
  public function poiCategory(string $poiCategory): self
  {
    $this->poi_category = $poiCategory;
    return $this;
  }
  public function poiCategoryExclusions(string $poiCategoryExclusions): self
  {
    $this->poi_category_exclusions = $poiCategoryExclusions;
    return $this;
  }
  public function autoComplete(bool $autoComplete): self
  {
    $this->auto_complete = $autoComplete;
    return $this;
  }
  public function etaType(string $etaType): self
  {
    $this->eta_type = $etaType;
    return $this;
  }
  public function navigationProfile(string $navigationProfile): self
  {
    $this->navigation_profile = $navigationProfile;
    return $this;
  }
  public function origin(string $origin): self
  {
    $this->origin = $origin;
    return $this;
  }
}
