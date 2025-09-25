<?php

namespace Thomsult\LaravelMapbox\Response\Common;

readonly class Coordinates
{
    public function __construct(
        public float $longitude,
        public float $latitude,
        public ?float $accuracy = null,
        public ?string $routable_points = null
    ) {}

    public static function fromArray(array $data): self
    {
        return new self(
            longitude: $data['longitude'] ?? 0,
            latitude: $data['latitude'] ?? 0,
            accuracy: $data['accuracy'] ?? null,
            routable_points: $data['routable_points'] ?? null
        );
    }
}