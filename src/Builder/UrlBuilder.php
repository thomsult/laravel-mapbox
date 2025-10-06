<?php

namespace Thomsult\LaravelMapbox\Builder;

class UrlBuilder
{
  public static function build(string $endpoint): string
  {
    return self::baseUrl() . '/' . ltrim(self::resolveEndpoint($endpoint), '/');
  }
  private static function baseUrl(): string
  {
    return rtrim(config('mapbox.base_uri'), '/');
  }

  private static function resolveEndpoint(string $key): string
  {

    if (empty($key)) {
      return '';
    }
    // Ex: "geocoding.batch_endpoint"
    $parts = explode('.', $key); // ['geocoding', 'batch_endpoint']

    if (count($parts) !== 2) {
      throw new \InvalidArgumentException("La clé doit être au format 'service.endpoint'");
    }

    [$service, $endpointKey] = $parts;

    $config = config("mapbox.$service");

    if (!$config) {
      throw new \Exception("Service '$service' non trouvé dans la configuration Mapbox.");
    }

    $endpoint = $config[$endpointKey] ?? null;
    if (!$endpoint) {
      throw new \Exception("Clé '$endpointKey' introuvable pour le service '$service'.");
    }

    // Construit le chemin complet
    return sprintf(
      "%s%s%s%s",
      $config['prefix'] ?? '',
      $config['base_endpoint'] ?? '',
      $config['api_version'] ?? '',
      $endpoint
    );
  }
}
