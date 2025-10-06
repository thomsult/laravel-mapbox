<?php

namespace Thomsult\LaravelMapbox\Services;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\TransferStats;
use Thomsult\LaravelMapbox\Builder\UrlBuilder;
use Thomsult\LaravelMapbox\Interfaces\MapboxApiInterface;
use Thomsult\LaravelMapbox\Response\BatchFeaturesResponse;
use Thomsult\LaravelMapbox\Response\CategoriesListResponse;
use Thomsult\LaravelMapbox\Response\FeaturesResponse;
use Thomsult\LaravelMapbox\Response\SearchResponse;
use Thomsult\LaravelMapbox\Services\Api\GeocodingAPI;
use Thomsult\LaravelMapbox\Services\Api\SearchBoxAPI;

class MapboxApi extends Client implements MapboxApiInterface
{
  use SearchBoxAPI;
  use GeocodingAPI;

  private object $requestConfig;
  private array $requestAuthConfig = [];
  private string $responseClass;

  public function __construct(
    private string $session_token,
    private string $access_token,
    public UrlBuilder $urlBuilder,
    array $config = []
  ) {
    parent::__construct($config);
  }

  /**
   * Retourne le tableau complet d'authentification
   */
  public function getAuthSessionToken(): array
  {
    return array_merge(
      $this->getSessionToken(),
      $this->getAccessToken()
    );
  }

  public function getSessionToken(): array
  {
    return ['session_token' => $this->session_token];
  }

  public function getAccessToken(): array
  {
    return ['access_token' => $this->access_token];
  }

  /**
   * Appelle l'API Mapbox et retourne une réponse typée
   *
   * @throws \Exception|GuzzleException
   */
  public function call(): CategoriesListResponse|FeaturesResponse|SearchResponse|BatchFeaturesResponse
  {
    if (!isset($this->requestConfig, $this->responseClass)) {
      throw new \Exception('Configuration de requête ou classe de réponse manquante.');
    }

    $method = strtoupper($this->requestConfig->getMethod());
    $uri = $this->requestConfig->getUri();

    $options = [
      'query' => array_merge(
        $this->requestConfig->getQuery() ?? [],
        $this->requestConfig->getOptions() ?? [],
        $this->requestAuthConfig
      ),
      'headers' => [
        'Content-Type' => $method === 'POST'
          ? 'application/json'
          : 'application/x-www-form-urlencoded',
      ],
      'on_stats' => function (TransferStats $stats) {
        echo "URL envoyée : " . $stats->getEffectiveUri() . "\n";
      },
    ];

    if ($method === 'POST') {
      if (!empty($this->requestConfig->getBody())) {
        $options['body'] = json_encode($this->requestConfig->getBody());
      } else {
        throw new \Exception('Body is required for POST requests');
      }
    }

    $response = $this->request($method, $uri, $options);

    if ($response->getStatusCode() !== 200) {
      throw new \Exception('Mapbox API request failed: ' . $response->getReasonPhrase());
    }

    return $this->responseClass::fromResponse($response);
  }
}
