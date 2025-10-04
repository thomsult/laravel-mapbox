<?php

namespace Thomsult\LaravelMapbox\Requests;

class ListCategoryRequest extends AbstractRequest
{
  private ?string $language;

  public function __construct(?string $language = null)
  {
    $this->language = $language;
  }

  public function getOptions(): array
  {
    return [
      'language' => $this->language ??  null
    ];
  }
}
