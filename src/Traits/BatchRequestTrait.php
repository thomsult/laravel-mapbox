<?php

namespace Thomsult\LaravelMapbox\Traits;

trait BatchRequestTrait
{
  /**
   * Transforme la requête actuelle en format compatible avec le batch Mapbox.
   *
   * @return array
   */
  public function toBatch(): array
  {
    $options = method_exists($this->options, 'toArray')
      ? (array) $this->options->toArray()
      : [];

    return array_merge(
      ($this->getQuery() || []),
      $options
    );
  }
}
