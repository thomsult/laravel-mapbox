<?php

namespace Thomsult\LaravelMapbox\Requests;

use Thomsult\LaravelMapbox\Interfaces\MapboxOptionsInterface;
use Thomsult\LaravelMapbox\Interfaces\MapboxRequestInterface;

class AbstractRequest implements MapboxRequestInterface
{
  public string $query;
  public ?MapboxOptionsInterface $options;
  protected string $method;
  protected string $uri;

  public function __construct(string $method, string $uri)
  {
    $this->method = $method;
    $this->uri = $uri;
    $this->query = '';
  }

  public function query(string $query): self
  {
    $this->query = $query;
    return $this;
  }
  public function getQuery(): array
  {
    return ['q' => $this->query];
  }

  public function options(?callable $builder = null): self
  {
    if ($builder) {
      $builder();
    }
    return $this;
  }
  public function getUri(): string
  {
    return $this->uri;
  }
  public function getMethod(): string
  {
    return $this->method;
  }
}
