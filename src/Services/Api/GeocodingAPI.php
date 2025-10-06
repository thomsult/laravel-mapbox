<?php

namespace Thomsult\LaravelMapbox\Services\Api;

use Closure;
use Thomsult\LaravelMapbox\Requests\Geocoding\BatchRequest;
use Thomsult\LaravelMapbox\Requests\Geocoding\ForwardTextRequest;
use Thomsult\LaravelMapbox\Requests\Geocoding\ForwardStructuredRequest;
use Thomsult\LaravelMapbox\Requests\Geocoding\ReverseRequest;
use Thomsult\LaravelMapbox\Response\BatchFeaturesResponse;
use Thomsult\LaravelMapbox\Response\FeaturesResponse;

trait GeocodingAPI
{


  public function forwardText(?callable $builder): self
  {

    $this->requestConfig = new ForwardTextRequest(
      'GET',
      'geocoding.forward_text_endpoint'
    );
    $this->responseClass = FeaturesResponse::class;
    $this->requestAuthConfig = $this->getAccessToken();

    if ($builder) {
      $builder($this->requestConfig);
    }

    return $this;
  }

  public function forwardStructured(?callable $builder): self
  {
    $this->requestConfig = new ForwardStructuredRequest(
      'GET',
      'geocoding.forward_structured_endpoint'
    );
    $this->responseClass = FeaturesResponse::class;
    $this->requestAuthConfig = $this->getAccessToken();

    if ($builder) {
      $builder($this->requestConfig);
    }

    return $this;
  }

  public function reverse(?callable $builder): self
  {
    $this->requestConfig = new ReverseRequest(
      'GET',
      'geocoding.reverse_endpoint'
    );
    $this->responseClass = FeaturesResponse::class;
    $this->requestAuthConfig = $this->getAccessToken();

    if ($builder) {
      $builder($this->requestConfig);
    }

    return $this;
  }

  public function batch(?callable $builder): self
  {
    $this->requestConfig = new BatchRequest('POST', 'geocoding.batch_endpoint');
    $this->responseClass = BatchFeaturesResponse::class;
    $this->requestAuthConfig = $this->getAccessToken();

    if ($builder) {
      $builder($this->requestConfig);
    }

    return $this;
  }
}
