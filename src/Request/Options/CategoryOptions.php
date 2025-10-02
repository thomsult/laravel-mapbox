<?php

namespace Thomsult\LaravelMapbox\Request\Options;

/*
 * CategoryOptions
 * Represents the options available for a category request.
 */


class CategoryOptions
{
  public function __construct(
    public ?string $language = null,
    public ?int $limit = 25,
    public ?string $proximity = null,
    public ?string $bbox = null,
    public ?string $country = null,
    public ?string $types = null,
    public ?string $poi_category_exclusions = null,
    public ?string $sar_type = null,
    public ?string $route = null,
    public ?string $route_geometry = null,
    public ?int $time_deviation = null
  ) {}

  public function toArray(): array
  {
    return [
      'language' => $this->language ?? null,
      'limit' => $this->limit ?? null,
      'proximity' => $this->proximity ?? null,
      'bbox' => $this->bbox ?? null,
      'country' => $this->country ?? null,
      'types' => $this->types ?? null,
      'poi_category_exclusions' => $this->poi_category_exclusions ?? null,
      'sar_type' => $this->sar_type ?? null,
      'route' => $this->route ?? null,
      'route_geometry' => $this->route_geometry ?? null,
      'time_deviation' => $this->time_deviation ?? null
    ];
  }
}
