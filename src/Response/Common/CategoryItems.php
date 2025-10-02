<?php

namespace Thomsult\LaravelMapbox\Response\Common;

class CategoryItems
{
  public function __construct(
    public string $canonical_id,
    public string $icon,
    public string $name,
    public string $version,
    public string $uuid,
  ) {}

  public static function fromArray(array $data): self
  {
    return new self(
      canonical_id: $data['canonical_id'],
      icon: $data['icon'],
      name: $data['name'],
      version: $data['version'],
      uuid: $data['uuid'],
    );
  }
}
