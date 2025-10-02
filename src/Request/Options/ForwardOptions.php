<?php

namespace Thomsult\LaravelMapbox\Request\Options;

/*
 * ForwardOptions
 * Represents the options available for a forward request.
 */

class ForwardOptions
{
  public function __construct(
    public ?string $language = '',
    public ?string $proximity = '',
    public ?string $bbox = '',
    public ?string $country = '',
    public ?string $types = '',
    public ?string $poi_category = '',
    public ?string $poi_category_exclusions = '',
    public ?bool $auto_complete = false,
    public ?string $eta_type = '',
    public ?string $navigation_profile = '',
    public ?string $origin = ''
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
