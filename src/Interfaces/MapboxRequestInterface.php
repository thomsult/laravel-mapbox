<?php

namespace Thomsult\LaravelMapbox\Interfaces;

interface MapboxRequestInterface
{
  /**
   * @param string $query
   * @return self
   */
  public function query(string $query): static;

  /**
   * @return array
   */
  public function getQuery(): array;

  /**
   * @param callable|null $builder
   * @return self
   */
  public function options(?callable $builder = null): static;

  /**
   * @return array
   */
  public function getOptions(): array;

  /**
   * @param callable|array $builder
   * @return self
   */
  public function body(?callable $builder = null): static;

  /**
   * @return array
   */
  public function getBody(): array;

  /**
   * Convert the request to a batch format.
   * This method is used to convert individual requests into a batch format
   * suitable for sending multiple requests in a single API call.
   * Use the BatchRequestTrait to implement this method.
   *
   * @return @return array|null|Throwable
   */
  public function toBatch();

  public function getUri(): string;

  public function getMethod(): string;
}
