<?php

namespace Thomsult\LaravelMapbox\Requests\Options;

use Thomsult\LaravelMapbox\Interfaces\MapboxOptionsInterface;

class ListCategoryOptions extends AbstractOption implements MapboxOptionsInterface
{
  protected ?string $language = null;

  public function language(string $language): self
  {
    $this->language = $language;
    return $this;
  }
}
