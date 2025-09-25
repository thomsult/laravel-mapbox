<?php

namespace Thomsult\LaravelMapbox\Services;

use GuzzleHttp\Client;
use Thomsult\LaravelMapbox\Services\Interactive\InteractiveApi;

class MapboxApi extends Client
{
  use InteractiveApi;
  

  public function __construct(
    private string $session_token,
    private string $access_token,
    public string $base_endpoint,
    array $config = [])
  {
    parent::__construct($config);
  }

  public function getAuthSessionToken(): array
  {
    // Implement your logic to retrieve the auth session token
    return [
      'access_token' => $this->access_token,
      'session_token' => $this->session_token
    ];
  }

}
