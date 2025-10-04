<?php

namespace Thomsult\LaravelMapbox\Requests\Options;

/*
 * SearchOptions
 * Represents the options available for a search request.
 */

class SearchOptions
{
  public function __construct(
    public ?array $types = null,
    public ?int $limit = null,
    public ?string $country = null,
    public ?string $language = null,

    public ?string $proximity = null,
    public ?string $bbox = null,
    public ?string $poi_category = null,
    public ?string $poi_category_exclusions = null,
    public ?string $eta_type = null,
    public ?string $navigation_profile = null,
    public ?string $origin = null,

  ) {}

  public function toArray(): array
  {
    return [
      'language' => $this->language,
      'limit' => $this->limit > 0 ? ($this->limit > 10 ? 10 : $this->limit) : null,
      'proximity' => $this->proximity ? $this->proximity : null,
      'country' => $this->country ?? null,
      'types' => $this->types ? implode(',', $this->types) : null,
      'bbox' => $this->bbox ? $this->bbox : null,
      'poi_category' => $this->poi_category ? $this->poi_category : null,
      'poi_category_exclusions' => $this->poi_category_exclusions ? $this->poi_category_exclusions : null,
      'eta_type' => $this->eta_type ? $this->eta_type : null,
      'navigation_profile' => $this->navigation_profile ? $this->navigation_profile : null,
      'origin' => $this->origin ? $this->origin : null,
    ];
  }
}
