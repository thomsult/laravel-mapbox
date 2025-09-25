<?php

namespace Thomsult\LaravelMapbox\Response\Common;

class ContextKey
{
    public function __construct(
      public string $id,
      public string $name
      ) {}

      public static function fromArray(array $data): self
      {
          return new self(
              id: $data['id'] ?? '',
              name: $data['name'] ?? ''
          );
      }
}
