<?php

namespace Thomsult\LaravelMapbox\Services\Api;

use Closure;
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



  public function autocomplete(?callable $builder): self
  {
    $this->requestConfig = new SearchRequest('GET', $this->base_endpoint . config('mapbox.search.suggest_endpoint'));
    $this->responseClass = SearchResponse::class;
    $this->requestAuthConfig = $this->getAuthSessionToken();

    if ($builder) {
      $builder($this->requestConfig); // le dev configure la requête
    }
    return $this;
  }

  public function retrieve(?callable $builder): self
  {
    $this->requestConfig = new RetrieveRequest('GET', $this->base_endpoint . config('mapbox.search.retrieve_endpoint') . "/");
    $this->responseClass = FeaturesResponse::class;
    $this->requestAuthConfig = $this->getAuthSessionToken();

    if ($builder) {
      $builder($this->requestConfig); // le dev configure la requête
    }
    return $this;
  }

  public function forward(?callable $builder): self
  {
    $this->requestConfig = new ForwardRequest('GET', $this->base_endpoint . config('mapbox.search.forward_endpoint'));
    $this->responseClass = FeaturesResponse::class;
    $this->requestAuthConfig = $this->getAccessToken();

    if ($builder) {
      $builder($this->requestConfig); // le dev configure la requête
    }

    return $this;
  }
  public function category(?callable $builder): self
  {
    $this->requestConfig = new CategoryRequest('GET', $this->base_endpoint . config('mapbox.search.category_endpoint'));
    $this->responseClass = FeaturesResponse::class;
    $this->requestAuthConfig = $this->getAccessToken();

    if ($builder) {
      $builder($this->requestConfig); // le dev configure la requête
    }

    return $this;
  }

  public function categoryList(?callable $builder): self
  {
    $this->requestConfig = new ListCategoryRequest('GET', $this->base_endpoint . config('mapbox.search.category_list_endpoint'));
    $this->responseClass = CategoriesListResponse::class;
    $this->requestAuthConfig = $this->getAccessToken();

    if ($builder) {
      $builder($this->requestConfig); // le dev configure la requête
    }

    return $this;
  }
  public function reverse(?callable $builder): self
  {
    $this->requestConfig = new ReverseRequest('GET', $this->base_endpoint . config('mapbox.search.reverse_endpoint'));
    $this->responseClass = FeaturesResponse::class;
    $this->requestAuthConfig = $this->getAccessToken();

    if ($builder) {
      $builder($this->requestConfig); // le dev configure la requête
    }

    return $this;
  }
}
