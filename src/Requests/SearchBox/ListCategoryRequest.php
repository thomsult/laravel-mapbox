<?php

namespace Thomsult\LaravelMapbox\Requests\SearchBox;

use Thomsult\LaravelMapbox\Requests\AbstractRequest;

use Thomsult\LaravelMapbox\Requests\Options\ListCategoryOptions;

class ListCategoryRequest extends AbstractRequest
{
  public function options(?callable $builder = null): self
  {
    $this->options = $builder ? $builder(new ListCategoryOptions()) : null;
    return $this;
  }
}
