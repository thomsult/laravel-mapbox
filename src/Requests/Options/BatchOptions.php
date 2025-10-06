<?php

namespace Thomsult\LaravelMapbox\Requests\Options;

use Exception;
use Thomsult\LaravelMapbox\Enums\PlaceType;
use Thomsult\LaravelMapbox\Interfaces\MapboxOptionsInterface;

/*
 * RetrieveOptions
 * Represents the options available for a reverse request.
 */

class BatchOptions extends AbstractOption implements MapboxOptionsInterface
{

  protected ?string $permanent = null;

  public function permanent(bool $value): self
  {
    $this->validate($value, 'permanent', ['required', 'boolean']);
    $this->permanent = $value ? 'true' : 'false';
    return $this;
  }
  public function language(string $language): self
  {
    throw new Exception("Not Implemented", 1);

    return $this;
  }
}
