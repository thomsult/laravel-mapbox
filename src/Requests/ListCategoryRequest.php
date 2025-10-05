<?php

namespace Thomsult\LaravelMapbox\Requests;

use Thomsult\LaravelMapbox\Requests\Options\ListCategoryOptions;

class ListCategoryRequest extends AbstractRequest
{
  public function options(?callable $builder = null): self
  {
    $this->options = $builder ? $builder(new ListCategoryOptions()) : null;
    return $this;
  }
}
