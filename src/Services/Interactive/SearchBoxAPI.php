<?php

namespace Thomsult\LaravelMapbox\Services\Interactive;

use Thomsult\LaravelMapbox\Request\CategoryRequest;
use Thomsult\LaravelMapbox\Request\ForwardRequest;
use Thomsult\LaravelMapbox\Request\ListCategoryRequest;
use Thomsult\LaravelMapbox\Request\RetrieveRequest;
use Thomsult\LaravelMapbox\Request\ReverseRequest;
use Thomsult\LaravelMapbox\Request\SearchRequest;
use Thomsult\LaravelMapbox\Response\CategoriesListResponse;
use Thomsult\LaravelMapbox\Response\FeaturesResponse;
use Thomsult\LaravelMapbox\Response\ForwardMapboxResponse;
use Thomsult\LaravelMapbox\Response\RetrieveMapboxResponse;
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
