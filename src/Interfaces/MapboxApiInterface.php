<?php

namespace Thomsult\LaravelMapbox\Interfaces;

use Thomsult\LaravelMapbox\Request\CategoryRequest;
use Thomsult\LaravelMapbox\Request\ForwardRequest;
use Thomsult\LaravelMapbox\Request\ListCategoryRequest;
use Thomsult\LaravelMapbox\Request\RetrieveRequest;
use Thomsult\LaravelMapbox\Request\ReverseRequest;
use Thomsult\LaravelMapbox\Request\SearchRequest;
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
