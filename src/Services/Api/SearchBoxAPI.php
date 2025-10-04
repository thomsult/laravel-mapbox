<?php

namespace Thomsult\LaravelMapbox\Services\Api;

use Thomsult\LaravelMapbox\Requests\CategoryRequest;
use Thomsult\LaravelMapbox\Requests\ForwardRequest;
use Thomsult\LaravelMapbox\Requests\ListCategoryRequest;
use Thomsult\LaravelMapbox\Requests\RetrieveRequest;
use Thomsult\LaravelMapbox\Requests\ReverseRequest;
use Thomsult\LaravelMapbox\Requests\SearchRequest;
use Thomsult\LaravelMapbox\Response\CategoriesListResponse;
use Thomsult\LaravelMapbox\Response\FeaturesResponse;
use Thomsult\LaravelMapbox\Response\SearchResponse;

trait SearchBoxAPI
{

  public function autocomplete(SearchRequest $request): SearchResponse
  {
    $response = $this->request('GET', $this->base_endpoint .
      config('mapbox.search.suggest_endpoint'), [
      'query' => [
        'q' => $request->getQuery(),
        ...($request->getOptions() ?? []),
        ...$this->getAuthSessionToken()
      ],
      'cache' => [
        'enabled' => config('mapbox.cache_ttl') > 0,
        'duration' => config('mapbox.cache_ttl')
      ]
    ]);
    if ($response->getStatusCode() !== 200) {
      throw new \Exception('Mapbox API request failed');
    }

    return SearchResponse::fromResponse($response);
  }

  public function retrieve(RetrieveRequest $request): FeaturesResponse
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

    return FeaturesResponse::fromResponse($response);
  }

  public function forward(ForwardRequest $request): FeaturesResponse
  {
    $response = $this->request('GET', $this->base_endpoint .
      config('mapbox.search.forward_endpoint'), [
      'query' => [
        'q' => $request->getQuery(),
        ...($request->getOptions() ?? []),
        ...$this->getAccessToken()
      ]
    ]);
    if ($response->getStatusCode() !== 200) {
      throw new \Exception('Mapbox API request failed');
    }

    return FeaturesResponse::fromResponse($response);
  }

  public function category(CategoryRequest $request): FeaturesResponse
  {
    $response = $this->request('GET', $this->base_endpoint .
      config('mapbox.search.category_endpoint') . "/" . $request->getId(), [
      'query' => [
        ...($request->getOptions() ?? []),
        ...$this->getAccessToken()
      ]
    ]);
    if ($response->getStatusCode() !== 200) {
      throw new \Exception('Mapbox API request failed');
    }

    return FeaturesResponse::fromResponse($response);
  }

  public function categoryList(ListCategoryRequest $request): CategoriesListResponse
  {
    $response = $this->request('GET', $this->base_endpoint .
      config('mapbox.search.category_list_endpoint'), [
      'query' => [
        ...($request->getOptions() ?? []),
        ...$this->getAccessToken()
      ]
    ]);
    if ($response->getStatusCode() !== 200) {
      throw new \Exception('Mapbox API request failed');
    }

    return CategoriesListResponse::fromResponse($response);
  }

  public function reverse(ReverseRequest $request): FeaturesResponse
  {
    $response = $this->request('GET', $this->base_endpoint .
      config('mapbox.search.reverse_endpoint'), [
      'query' => [
        ...$request->getQuery(),
        ...($request->getOptions() ?? []),
        ...$this->getAccessToken()
      ]
    ]);
    if ($response->getStatusCode() !== 200) {
      throw new \Exception('Mapbox API request failed');
    }

    return FeaturesResponse::fromResponse($response);
  }
}
