<?php

namespace Thomsult\LaravelMapbox\Services\Api;

use Closure;
use Thomsult\LaravelMapbox\Requests\SearchBox\CategoryRequest;
use Thomsult\LaravelMapbox\Requests\SearchBox\ForwardRequest;
use Thomsult\LaravelMapbox\Requests\SearchBox\ListCategoryRequest;
use Thomsult\LaravelMapbox\Requests\SearchBox\RetrieveRequest;
use Thomsult\LaravelMapbox\Requests\SearchBox\ReverseRequest;
use Thomsult\LaravelMapbox\Requests\SearchBox\SearchRequest;
use Thomsult\LaravelMapbox\Response\CategoriesListResponse;
use Thomsult\LaravelMapbox\Response\FeaturesResponse;
use Thomsult\LaravelMapbox\Response\SearchResponse;


trait SearchBoxAPI
{



  public function autocomplete(?callable $builder): self
  {
    $this->requestConfig = new SearchRequest('GET', 'search.suggest_endpoint');
    $this->responseClass = SearchResponse::class;
    $this->requestAuthConfig = $this->getAuthSessionToken();

    if ($builder) {
      $builder($this->requestConfig);
    }
    return $this;
  }

  public function retrieve(?callable $builder): self
  {
    $this->requestConfig = new RetrieveRequest('GET', 'search.retrieve_endpoint');
    $this->responseClass = FeaturesResponse::class;
    $this->requestAuthConfig = $this->getAuthSessionToken();

    if ($builder) {
      $builder($this->requestConfig);
    }
    return $this;
  }

  public function forward(?callable $builder): self
  {
    $this->requestConfig = new ForwardRequest('GET', 'search.forward_endpoint');
    $this->responseClass = FeaturesResponse::class;
    $this->requestAuthConfig = $this->getAccessToken();

    if ($builder) {
      $builder($this->requestConfig);
    }

    return $this;
  }
  public function category(?callable $builder): self
  {
    $this->requestConfig = new CategoryRequest('GET', 'search.category_endpoint');
    $this->responseClass = FeaturesResponse::class;
    $this->requestAuthConfig = $this->getAccessToken();

    if ($builder) {
      $builder($this->requestConfig);
    }

    return $this;
  }

  public function categoryList(?callable $builder): self
  {
    $this->requestConfig = new ListCategoryRequest('GET', 'search.category_list_endpoint');
    $this->responseClass = CategoriesListResponse::class;
    $this->requestAuthConfig = $this->getAccessToken();

    if ($builder) {
      $builder($this->requestConfig);
    }

    return $this;
  }
  public function reverseGeocode(?callable $builder): self
  {
    $this->requestConfig = new ReverseRequest('GET', 'search.reverse_endpoint');
    $this->responseClass = FeaturesResponse::class;
    $this->requestAuthConfig = $this->getAccessToken();

    if ($builder) {
      $builder($this->requestConfig);
    }

    return $this;
  }
}
