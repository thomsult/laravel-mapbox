<?php

namespace Thomsult\LaravelMapbox\Requests\Options;

use Thomsult\LaravelMapbox\Interfaces\MapboxOptionsInterface;

/*
 * RetrieveOptions
 * Represents the options available for a retrieve request.
 */

class RetrieveOptions extends AbstractOption implements MapboxOptionsInterface
{

  protected ?string $eta_type = null;
  protected ?string $navigation_profile = null;
  protected ?string $origin = null;


  public function etaType(string $etaType): self
  {
    $this->validate($etaType, 'eta_type', ['required', 'string']);
    $this->eta_type = $etaType;
    return $this;
  }
  public function navigationProfile(string $navigationProfile): self
  {
    $this->validate($navigationProfile, 'navigation_profile', ['required', 'string']);
    $this->navigation_profile = $navigationProfile;
    return $this;
  }
  public function origin(string $origin): self
  {
    $this->validate($origin, 'origin', ['required', 'string']);
    $this->origin = $origin;
    return $this;
  }
}
