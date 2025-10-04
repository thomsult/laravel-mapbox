<?php

namespace Thomsult\LaravelMapbox\Interfaces;

use Thomsult\LaravelMapbox\Requests\CategoryRequest;
use Thomsult\LaravelMapbox\Requests\ForwardRequest;
use Thomsult\LaravelMapbox\Requests\ListCategoryRequest;
use Thomsult\LaravelMapbox\Requests\RetrieveRequest;
use Thomsult\LaravelMapbox\Requests\ReverseRequest;
use Thomsult\LaravelMapbox\Requests\SearchRequest;
use Thomsult\LaravelMapbox\Response\CategoriesListResponse;
use Thomsult\LaravelMapbox\Response\FeaturesResponse;
use Thomsult\LaravelMapbox\Response\SearchResponse;

interface MapboxApiInterface
{
    public function getAuthSessionToken(): array;

    public function autocomplete(SearchRequest $request): SearchResponse;

    public function retrieve(RetrieveRequest $request): FeaturesResponse;

    public function forward(ForwardRequest $request): FeaturesResponse;

    public function category(CategoryRequest $request): FeaturesResponse;

    public function categoryList(ListCategoryRequest $request): CategoriesListResponse;

    public function reverse(ReverseRequest  $request): FeaturesResponse;
}
