<?php

namespace Thomsult\LaravelMapbox\Requests;

use Illuminate\Support\Facades\Validator;
use Thomsult\LaravelMapbox\Builder\BodyBuilder;
use Thomsult\LaravelMapbox\Builder\UrlBuilder;
use Thomsult\LaravelMapbox\Interfaces\MapboxOptionsInterface;
use Thomsult\LaravelMapbox\Interfaces\MapboxRequestInterface;
use Thomsult\LaravelMapbox\Requests\Options\EmptyOptions;
use Throwable;

class AbstractRequest implements MapboxRequestInterface
{
  protected string $query;
  protected ?MapboxOptionsInterface $options;
  protected string $method;
  protected string $uri;
  protected BodyBuilder $body;

  public function __construct(?string $method = "GET", ?string $endpoint = '')
  {
    $validator = Validator::make(['method' => $method, 'endpoint' => $endpoint], [
      'method' => ['required', 'string', 'in:GET,POST'],
      'endpoint' => ['required', 'string']
    ]);

    if ($validator->fails()) {
      throw new \InvalidArgumentException($validator->errors());
    }
    $this->method = $method;
    $this->uri = UrlBuilder::build($endpoint);
    $this->query = '';
    $this->options = new EmptyOptions();
    $this->body = new BodyBuilder();
  }

  public function query(string $query): static
  {

    $validator = Validator::make(['query' => $query], [
      'query'  => ['required', 'string', 'min:3', 'max:255', 'not_in:{query}']
    ]);

    if ($validator->fails()) {
      throw new \InvalidArgumentException($validator->errors()->first('query'));
    }

    $this->query = $query;
    return $this;
  }
  public function getQuery(): array
  {
    return ['q' => $this->query];
  }


  public function body(?callable $builder = null): static
  {
    $this->body = $builder ? $builder(new BodyBuilder()) : null;
    return $this;
  }
  public function getBody(): array
  {
    return $this->body ? $this->body->getBody() : [];
  }

  public function options(?callable $builder = null): static
  {
    if ($builder) {
      $builder();
    }
    return $this;
  }
  public function getOptions(): array
  {
    return $this->options ? $this->options->toArray() : [];
  }
  public function getUri(): string
  {
    return $this->uri;
  }
  public function getMethod(): string
  {
    return $this->method;
  }
  public function toBatch(): array|Throwable
  {
    throw new \Exception("Batch requests are not supported.");
  }
}
