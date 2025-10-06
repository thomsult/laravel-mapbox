<?php

namespace Thomsult\LaravelMapbox\Interfaces;

use Thomsult\LaravelMapbox\Requests\CategoryRequest;
use Thomsult\LaravelMapbox\Requests\ForwardRequest;
use Thomsult\LaravelMapbox\Requests\ListCategoryRequest;
use Thomsult\LaravelMapbox\Requests\RetrieveRequest;
use Thomsult\LaravelMapbox\Requests\ReverseRequest;
use Thomsult\LaravelMapbox\Requests\SearchRequest;
use Thomsult\LaravelMapbox\Response\BatchFeaturesResponse;
use Thomsult\LaravelMapbox\Response\CategoriesListResponse;
use Thomsult\LaravelMapbox\Response\FeaturesResponse;
use Thomsult\LaravelMapbox\Response\SearchResponse;
use Throwable;

interface MapboxApiInterface
{
    /** @return array { access_token: string,session_token: string } */
    public function getAuthSessionToken(): array;

    public function call(): MapboxResponseInterface|Throwable;

    /// SearchBoxApiInterface

    /**
     * @param callable(SearchRequest): SearchRequest $builder
     * @return self
     */
    public function autocomplete(callable $builder): self;

    /**
     * @param callable(RetrieveRequest): RetrieveRequest $builder
     * @return self
     */
    public function retrieve(callable $builder): self;

    /**
     * @param callable(ForwardRequest): ForwardRequest $builder
     * @return self
     */
    public function forward(callable $builder): self;

    /**
     * @param callable(CategoryRequest): CategoryRequest $builder
     * @return self
     */
    public function category(callable $builder): self;

    /**
     * @param callable(ListCategoryRequest): ListCategoryRequest $builder
     * @return self
     */
    public function categoryList(callable $builder): self;

    /**
     * @param callable(ReverseRequest): ReverseRequest $builder
     * @return self
     */
    public function reverse(callable $builder): self;

    /// GeocodingApiInterface

    /**
     * @param callable(ForwardTextRequest): ForwardTextRequest $builder
     * @return self
     */
    public function forwardText(callable $builder): self;

    /**
     * @param callable(ForwardStructuredRequest): ForwardStructuredRequest $builder
     * @return self
     */
    public function forwardStructured(callable $builder): self;

    /**
     * @param callable(ReverseRequest): ReverseRequest $builder
     * @return self
     */
    public function reverseGeocode(callable $builder): self;

    /**
     * @param callable(BatchRequest): BatchRequest $builder
     * @return self
     */
    public function batch(callable $builder): self;
}
