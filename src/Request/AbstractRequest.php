<?php

namespace Thomsult\LaravelMapbox\Request;

class AbstractRequest
{
  public function __construct(
    private ?string $query,
    private ?array $options = null
  ) {}

  public function getQuery(): ?string
  {
    return $this->query;
  }

  public function getOptions(): ?array
  {
    return $this->options ?? null;
  }
}
