<?php

namespace Thomsult\LaravelMapbox\Services;

use GuzzleHttp\Client;
use Thomsult\LaravelMapbox\Interfaces\MapboxApiInterface;
use Thomsult\LaravelMapbox\Services\Api\SearchBoxAPI;

class MapboxApi extends Client implements MapboxApiInterface
{
  use SearchBoxAPI;


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
    // Implement your logic to retrieve the auth session token
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
}
