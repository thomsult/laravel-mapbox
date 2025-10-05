<?php

namespace Thomsult\LaravelMapbox\Interfaces;

interface MapboxRequestInterface
{
  /**
   * @param string $query
   * @return self
   */
  public function query(string $query): self;

  /**
   * @param callable|null $builder
   * @return self
   */
  public function options(?callable $builder = null): self;
}
