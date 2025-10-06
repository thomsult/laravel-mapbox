<?php

namespace Thomsult\LaravelMapbox\Interfaces;

interface MapboxResponseInterface
{

  public static function fromResponse($response): self;

  public function toArray(): array;
}
