<?php

namespace Thomsult\LaravelMapbox\Response;

use Illuminate\Support\Collection;
use Thomsult\LaravelMapbox\Interfaces\MapboxResponseInterface;
use Thomsult\LaravelMapbox\Response\Features\Feature;

readonly class FeaturesResponse implements MapboxResponseInterface
{
  /** @param Collection<int, FeatureSet> $features */
  public function __construct(
    public Collection $features,
    public string $type,
    public string $attribution,
    public int $status
  ) {}

  public static function fromResponse($response): self
  {
    $data = json_decode($response->getBody()->getContents(), true);
    if (isset($data['error'])) {
      throw new \Exception($data['error']);
    }
    if (isset($data['features'])) {
      $features = collect($data['features'])
        ->map(fn(array $feature) => Feature::fromArray($feature));
    } else {
      $features = collect();
    }

    return new self(
      features: $features,
      attribution: $data['attribution'] ?? '',
      type: $data['type'] ?? '',
      status: $data['status'] ?? 200
    );
  }
  public function getFeature(): ?Feature
  {
    return $this->features->first();
  }

  public function isEmpty(): bool
  {
    return $this->features->isEmpty();
  }

  public function count(): int
  {
    return $this->features->count();
  }
  public static function fromArray(array $data): self
  {
    $features = collect($data['features'] ?? [])
      ->map(fn(array $feature) => Feature::fromArray($feature));
    return new self(
      features: $features,
      attribution: $data['attribution'] ?? '',
      type: $data['type'] ?? '',
      status: $data['status'] ?? 200
    );
  }

  public function toArray(): array
  {
    return [
      'features' => $this->features->toArray(),
      'attribution' => $this->attribution,
      'type' => $this->type,
      'status' => $this->status
    ];
  }
}
