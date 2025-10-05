<?php

namespace Thomsult\LaravelMapbox\Services;

use GuzzleHttp\Client;
use Psr\Http\Message\RequestInterface;
use Thomsult\LaravelMapbox\Interfaces\MapboxApiInterface;
use Thomsult\LaravelMapbox\Requests\SearchRequest;
use Thomsult\LaravelMapbox\Response\CategoriesListResponse;
use Thomsult\LaravelMapbox\Response\FeaturesResponse;
use Thomsult\LaravelMapbox\Response\SearchResponse;
use Thomsult\LaravelMapbox\Services\Api\SearchBoxAPI;

class MapboxApi extends Client implements MapboxApiInterface
{
  use SearchBoxAPI;

  private $requestConfig;
  private array $requestAuthConfig;
  private string $method;
  private string $uri;
  private string $responseClass;

  public function __construct(
    private string $session_token,
    private string $access_token,
    public string $base_endpoint,
    array $config = []
  ) {
    parent::__construct($config);
  }

  public function getAuthSessionToken(): array
  {
    return [
      ...$this->getSessionToken(),
      ...$this->getAccessToken()
    ];
  }
  public function getSessionToken(): array
  {
    return ['session_token' => $this->session_token];
  }
  public function getAccessToken(): array
  {
    return ['access_token' => $this->access_token];
  }


  public function call(): CategoriesListResponse | FeaturesResponse | SearchResponse
  {
    $response = $this->request($this->requestConfig->getMethod(), $this->requestConfig->getUri(), [
      'query' => [
        ...($this->requestConfig->getQuery() ? $this->requestConfig->getQuery() : []),
        ...($this->requestConfig->options->toArray() ?? []),
        ...$this->requestAuthConfig
      ],
      'on_stats' => function (\GuzzleHttp\TransferStats $stats) {
        echo "URL envoyée : " . $stats->getEffectiveUri() . "\n";
      }
    ]);
    if ($response->getStatusCode() !== 200) {
      throw new \Exception('Mapbox API request failed');
    }
    return $this->responseClass::fromResponse($response);
  }
}
