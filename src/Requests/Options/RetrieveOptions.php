<?php

namespace Thomsult\LaravelMapbox\Requests\Options;

/*
 * RetrieveOptions
 * Represents the options available for a retrieve request.
 */

class RetrieveOptions
{
  public function __construct(
    public ?string $language = null,
    public ?string $eta_type = null,
    public ?string $navigation_profile = null,
    public ?string $origin = null,

  ) {}

  public function toArray(): array
  {
    return [
      'language' => $this->language ?? null,
      'eta_type' => $this->eta_type ?? null,
      'navigation_profile' => $this->navigation_profile ?? null,
      'origin' => $this->origin ?? null,
    ];
  }
}
