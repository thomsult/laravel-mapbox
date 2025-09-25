<?php

namespace Thomsult\LaravelMapbox\Response\Common;


readonly class Context
{
    public function __construct(
        public ?Country $country = null,
        public ?ContextKey $region = null,
        public ?ContextKey $postcode = null,
        public ?ContextKey $district = null,
        public ?ContextKey $place = null,
        public ?ContextKey $locality = null,
        public ?ContextKey $neighborhood = null,
        public ?Address $address = null,
        public ?ContextKey $street = null
    ) {}

    public static function fromArray(array $data): self
    {
        return new self(
            country: isset($data['country']) ? Country::fromArray($data['country']) : null,
            region: isset($data['region']) ? ContextKey::fromArray($data['region']) : null,
            postcode: isset($data['postcode']) ? ContextKey::fromArray($data['postcode']) : null,
            district: isset($data['district']) ? ContextKey::fromArray($data['district']) : null,
            place: isset($data['place']) ? ContextKey::fromArray($data['place']) : null,
            locality: isset($data['locality']) ? ContextKey::fromArray($data['locality']) : null,
            neighborhood: isset($data['neighborhood']) ? ContextKey::fromArray($data['neighborhood']) : null,
            address: isset($data['address']) ? Address::fromArray($data['address']) : null,
            street: isset($data['street']) ? ContextKey::fromArray($data['street']) : null
        );
    }
}