<?php

namespace Thomsult\LaravelMapbox\Response\Common;

readonly class Coordinates
{
    public float $longitude;
    public float $latitude;

    public function __construct(
        string $longitude,
        string $latitude,
        public ?string $accuracy = null,
        public ?array $routable_points = []
    ) {
        $this->longitude = (float) $longitude;
        $this->latitude = (float) $latitude;
    }

    public static function fromArray(array $data): self
    {
        return new self(
            longitude: $data['longitude'] ?? '0',
            latitude: $data['latitude'] ?? '0',
            accuracy: $data['accuracy'] ?? null,
            routable_points: isset($data['routable_points']) ? array_map(fn($point) => RoutablePoints::fromArray($point), $data['routable_points']) : null
        );
    }
}
