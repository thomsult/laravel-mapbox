<?php

namespace Thomsult\LaravelMapbox\Requests\Options;

/*
 * CategoryOptions
 * Represents the options available for a category request.
 */


class CategoryOptions
{

  protected ?string $language = null;
  protected ?int $limit = 25;
  protected ?string $proximity = null;
  protected ?string $bbox = null;
  protected ?string $country = null;
  protected ?string $types = null;
  protected ?string $poi_category_exclusions = null;
  protected ?string $sar_type = null;
  protected ?string $route = null;
  protected ?string $route_geometry = null;
  protected ?int $time_deviation = null;


  public function language(string $language): self
  {
    $this->language = $language;
    return $this;
  }
  public function limit(int $limit): self
  {
    $this->limit = $limit;
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

  public function poiCategoryExclusions(string $poi_category_exclusions): self
  {
    $this->poi_category_exclusions = $poi_category_exclusions;
    return $this;
  }

  public function sarType(string $sar_type): self
  {
    $this->sar_type = $sar_type;
    return $this;
  }

  public function route(string $route): self
  {
    $this->route = $route;
    return $this;
  }

  public function routeGeometry(string $route_geometry): self
  {
    $this->route_geometry = $route_geometry;
    return $this;
  }

  public function timeDeviation(int $time_deviation): self
  {
    $this->time_deviation = $time_deviation;
    return $this;
  }
}
