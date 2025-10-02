<?php

namespace Thomsult\LaravelMapbox\Request\Options;

use Thomsult\LaravelMapbox\Enums\PlaceType;

/*
 * RetrieveOptions
 * Represents the options available for a reverse request.
 */

class ReverseOptions
{
  public function __construct(
    public ?string $language = null,
    public ?int $limit = 10,
    public ?string $country = null,
    public ?string $types = null,

  ) {}

  public function toArray(): array
  {
    return [
      'language' => $this->language ?? null,
      'limit' => $this->limit ?? null,
      'country' => $this->country ?? null,
      'types' =>  $this->types ? PlaceType::fromValue($this->types)->value : null
    ];
  }
}
