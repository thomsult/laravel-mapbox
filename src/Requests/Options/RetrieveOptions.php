<?php

namespace Thomsult\LaravelMapbox\Requests\Options;

use Thomsult\LaravelMapbox\Interfaces\MapboxOptionsInterface;

/*
 * RetrieveOptions
 * Represents the options available for a retrieve request.
 */

class RetrieveOptions extends AbstractOption implements MapboxOptionsInterface
{

  protected ?string $language = null;
  protected ?string $eta_type = null;
  protected ?string $navigation_profile = null;
  protected ?string $origin = null;

  public function language(string $language): self
  {
    $this->language = $language;
    return $this;
  }
  public function etaType(string $etaType): self
  {
    $this->eta_type = $etaType;
    return $this;
  }
  public function navigationProfile(string $navigationProfile): self
  {
    $this->navigation_profile = $navigationProfile;
    return $this;
  }
  public function origin(string $origin): self
  {
    $this->origin = $origin;
    return $this;
  }
}
