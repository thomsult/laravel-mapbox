<?php
namespace Thomsult\LaravelMapbox\Response\Common;

class Geometry
{
    public function __construct(
        public string $type,
        public array $coordinates
    ) {}

    public static function fromArray(array $data): self
    {
        return new self(
            type: $data['type'],
            coordinates: $data['coordinates'] ?? []
        );
    }
    
}