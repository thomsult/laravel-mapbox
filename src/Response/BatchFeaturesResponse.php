<?php

namespace Thomsult\LaravelMapbox\Response;

use Illuminate\Support\Collection;
use Thomsult\LaravelMapbox\Interfaces\MapboxResponseInterface;

readonly class BatchFeaturesResponse implements MapboxResponseInterface
{
  /** @param Collection<int, FeaturesResponse> $batch */
  public function __construct(
    public Collection $batch,
    public int $status
  ) {}

  public static function fromResponse($response): self
  {
    $data = json_decode($response->getBody()->getContents(), true);
    if (isset($data['error'])) {
      throw new \Exception($data['error']);
    }
    if (isset($data['batch'])) {
      $batch = collect($data['batch'])
        ->map(fn(array $feature) => FeaturesResponse::fromArray($feature));
    } else {
      $batch = collect();
    }

    return new self(
      batch: $batch,
      status: $data['status'] ?? 200
    );
  }

  public function toArray(): array
  {
    return [
      'batch' => $this->getBatch(),
      'status' => $this->status
    ];
  }
  public function getBatch(): Collection
  {
    return $this->batch;
  }
}
