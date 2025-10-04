<?php

namespace Thomsult\LaravelMapbox\Requests\Options;

/*
 * ForwardOptions
 * Represents the options available for a forward request.
 */

class ForwardOptions
{
  public function __construct(
    public ?string $language = null,
    public ?string $proximity = null,
    public ?string $bbox = null,
    public ?string $country = null,
    public ?string $types = null,
    public ?string $poi_category = null,
    public ?string $poi_category_exclusions = null,
    public ?bool $auto_complete = null,
    public ?string $eta_type = null,
    public ?string $navigation_profile = null,
    public ?string $origin = null
  ) {}


  public function toArray(): array
  {
    return [
      'language' => $this->language ?? null,
      'proximity' => $this->proximity ?? null,
      'bbox' => $this->bbox ?? null,
      'country' => $this->country ?? null,
      'types' => $this->types ?? null,
      'poi_category' => $this->poi_category ?? null,
      'poi_category_exclusions' => $this->poi_category_exclusions ?? null,
      'auto_complete' => $this->auto_complete ?? null,
      'eta_type' => $this->eta_type ?? null,
      'navigation_profile' => $this->navigation_profile ?? null,
      'origin' => $this->origin ?? null,
    ];
  }
}
