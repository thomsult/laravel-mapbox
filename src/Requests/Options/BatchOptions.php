<?php

namespace Thomsult\LaravelMapbox\Requests\Options;

use Thomsult\LaravelMapbox\Enums\PlaceType;
use Thomsult\LaravelMapbox\Interfaces\MapboxOptionsInterface;

/*
 * RetrieveOptions
 * Represents the options available for a reverse request.
 */

class BatchOptions extends AbstractOption implements MapboxOptionsInterface
{

  protected ?string $permanent = null;

  public function permanent(string $permanent): self
  {
    $this->permanent = $permanent;
    return $this;
  }
}
