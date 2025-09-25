<?php

namespace Thomsult\LaravelMapbox\Response\Suggestions;

use Thomsult\LaravelMapbox\Enums\PlaceType;
use Thomsult\LaravelMapbox\Response\Common\AbstractPlace;
use Thomsult\LaravelMapbox\Response\Common\Context;
use Thomsult\LaravelMapbox\Response\Common\Coordinates;

readonly class Suggestion extends AbstractPlace
{
    public static function fromArray(array $data): self
    {
        return new self(
            name: $data['name'] ?? '',
            name_preferred: $data['name_preferred'] ?? null,
            mapbox_id: $data['mapbox_id'] ?? '',
            feature_type: PlaceType::from($data['feature_type'] ?? PlaceType::UNKNOWN->value),
            address: $data['address'] ?? null,
            full_address: $data['full_address'] ?? null,
            place_formatted: $data['place_formatted'] ?? '',
            context: Context::fromArray($data['context'] ?? []),
            language: $data['language'] ?? 'en',
            maki: $data['maki'] ?? null,
            poi_category: $data['poi_category'] ?? [],
            poi_category_ids: $data['poi_category_ids'] ?? [],
            brand: $data['brand'] ?? [],
            brand_ids: $data['brand_ids'] ?? [],
            external_ids: $data['external_ids'] ?? [],
            metadata: $data['metadata'] ?? [],
            distance: $data['distance'] ?? null,
            eta: $data['eta'] ?? null,
            added_distance: $data['added_distance'] ?? null,
            added_time: $data['added_time'] ?? null,
        );
    }

}