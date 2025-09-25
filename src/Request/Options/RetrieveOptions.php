<?php

namespace Thomsult\LaravelMapbox\Request\Options;

/*
 * RetrieveOptions
 * Represents the options available for a retrieve request.
 */
class RetrieveOptions 
{
  public function __construct(
    public ?string $language = '',
    public ?string $eta_type = '',
    public ?string $navigation_profile = '',
    public ?string $origin = '',

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
