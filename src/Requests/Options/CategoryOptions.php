<?php

namespace Thomsult\LaravelMapbox\Requests\Options;

/*
 * CategoryOptions
 * Represents the options available for a category request.
 */


class CategoryOptions extends AbstractOption
{

  protected ?int $limit = 25;
  protected ?string $proximity = null;
  protected ?string $bbox = null;
  protected ?string $country = null;
  protected ?array $types = null;
  protected ?string $poi_category_exclusions = null;
  protected ?string $sar_type = null;
  protected ?string $route = null;
  protected ?string $route_geometry = null;
  protected ?int $time_deviation = null;

  public function limit(int $limit): self
  {
    $this->validate($limit, 'limit', ['required', 'integer', 'min:1', 'max:25']);
    $this->limit = $limit;
    return $this;
  }
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
    $this->validate($country, 'country', ['required', 'string']);
    $this->country = $country;
    return $this;
  }

  public function types(array $types): self
  {
    $this->validate($types, 'types', ['required', 'array']);
    $this->types = $types;
    return $this;
  }

  public function poiCategoryExclusions(string $poi_category_exclusions): self
  {
    $this->validate($poi_category_exclusions, 'poi_category_exclusions', ['required', 'string']);
    $this->poi_category_exclusions = $poi_category_exclusions;
    return $this;
  }

  public function sarType(string $sar_type): self
  {
    $this->validate($sar_type, 'sar_type', ['required', 'string']);
    $this->sar_type = $sar_type;
    return $this;
  }

  public function route(string $route): self
  {
    $this->validate($route, 'route', ['required', 'string']);
    $this->route = $route;
    return $this;
  }

  public function routeGeometry(string $route_geometry): self
  {
    $this->validate($route_geometry, 'route_geometry', ['required', 'string']);
    $this->route_geometry = $route_geometry;
    return $this;
  }

  public function timeDeviation(int $time_deviation): self
  {
    $this->validate($time_deviation, 'time_deviation', ['required', 'integer']);
    $this->time_deviation = $time_deviation;
    return $this;
  }
}
