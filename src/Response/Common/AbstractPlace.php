<?php
namespace Thomsult\LaravelMapbox\Response\Common;

use Thomsult\LaravelMapbox\Enums\PlaceType;
use Thomsult\LaravelMapbox\Response\Common\Context;

abstract readonly class AbstractPlace
{
    public function __construct(
        public string $name,
        public ?string $name_preferred,
        public string $mapbox_id,
        public PlaceType $feature_type,
        public ?string $address,
        public ?string $full_address,
        public string $place_formatted,
        public Context $context,
        public string $language,
        public ?string $maki,
        public ?array $poi_category = null,
        public ?array $poi_category_ids = null,
        public ?array $brand = null,
        public ?array $brand_ids = null,
        public ?array $external_ids = null,
        public ?array $metadata = null,
        public ?int $distance = null,
        public ?int $eta = null,
        public ?int $added_distance = null,
        public ?int $added_time = null,
    ) {}
}
