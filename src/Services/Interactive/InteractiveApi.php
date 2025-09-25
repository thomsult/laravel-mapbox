<?php
namespace Thomsult\LaravelMapbox\Services\Interactive;

use GuzzleHttp\Client;
use Thomsult\LaravelMapbox\Request\RetrieveRequest;
use Thomsult\LaravelMapbox\Request\SearchRequest;
use Thomsult\LaravelMapbox\Response\RetrieveMapboxResponse;
use Thomsult\LaravelMapbox\Response\SearchMapboxResponse;

trait InteractiveApi
{
  
  public function autocomplete(SearchRequest $request): SearchMapboxResponse
  {
    $response = $this->request('GET', $this->base_endpoint .
      config('mapbox.search.suggest_endpoint'), [
      'query' => [
        'q' => $request->getQuery(),
        ...($request->getOptions() ?? []),
        ...$this->getAuthSessionToken()
      ]
    ]);
    if ($response->getStatusCode() !== 200) {
      throw new \Exception('Mapbox API request failed');
    }

    return SearchMapboxResponse::fromResponse($response);
  }
  public function retrieve(RetrieveRequest $request): RetrieveMapboxResponse
  {
    $response = $this->request('GET', $this->base_endpoint . config('mapbox.search.retrieve_endpoint') . "/" . $request->getId(), [
      'query' => [
        ...($request->getOptions() ?? []),
        ...$this->getAuthSessionToken()
      ]
    ]);
    if ($response->getStatusCode() !== 200) {
      throw new \Exception('Mapbox API request failed');
    }

    return RetrieveMapboxResponse::fromResponse($response);
  }
}
