<?php
namespace Thomsult\LaravelMapbox\Response\Common;

use Thomsult\LaravelMapbox\Response\Common\ContextKey;

class Address extends ContextKey
{
    public function __construct(
        public string $id,
        public string $name,
        public ?string $address_number,
        public ?string $street_name,
       
    ) {
        parent::__construct($id, $name);
    }

    public static function fromArray(array $data): self
    {
        return new self(
            id: $data['id'] ?? '',
            name: $data['name'] ?? '',
            address_number: $data['address_number'] ?? null,
            street_name: $data['street_name'] ?? null 
        );
    }
}