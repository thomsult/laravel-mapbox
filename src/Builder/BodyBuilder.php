<?php

namespace Thomsult\LaravelMapbox\Builder;

use Thomsult\LaravelMapbox\Interfaces\MapboxRequestInterface;

class BodyBuilder
{
  private array $body = [];

  public function add(MapboxRequestInterface $key): self
  {
    $this->body[] = $key->toBatch();
    return $this;
  }

  public function getBody(): array
  {
    return $this->body;
  }
  public function toArray(): array
  {
    return $this->body;
  }
}
