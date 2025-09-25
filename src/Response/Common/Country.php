<?php

namespace Thomsult\LaravelMapbox\Response\Common;


readonly class Country
{
    public function __construct(
        public string $id,
        public string $name,
        public string $countryCode,
        public string $countryCodeAlpha3
    ) {}

    public static function fromArray(array $data): self
    {
        return new self(
            id: $data['id'],
            name: $data['name'],
            countryCode: $data['country_code'],
            countryCodeAlpha3: $data['country_code_alpha_3']
        );
    }
}