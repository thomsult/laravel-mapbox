<?php
namespace Thomsult\LaravelMapbox\Response\Features;

use Thomsult\LaravelMapbox\Response\Common\Geometry;
use Thomsult\LaravelMapbox\Response\Common\Properties;

class Feature
{
    public function __construct(
        public string $type = 'Feature',
        public Geometry $geometry,
        public Properties $properties,
    ) {}

    public static function fromArray(array $data): self
    {
        return new self(
            type: $data['type'] ?? 'Feature',
            geometry: Geometry::fromArray($data['geometry'] ?? []),
            properties: Properties::fromArray($data['properties'] ?? []),
        );
    }
}