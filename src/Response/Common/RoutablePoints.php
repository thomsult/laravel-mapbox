<?php

namespace Thomsult\LaravelMapbox\Response\Common;

class RoutablePoints
{
  public function __construct(
    public string $name,
    public float $latitude,
    public float $longitude
  ) {}

  public static function fromArray(array $data): self
  {
    return new self(
      name: $data['name'] ?? '',
      latitude: $data['latitude'] ?? 0,
      longitude: $data['longitude'] ?? 0
    );
  }
}
