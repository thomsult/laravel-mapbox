<?php

namespace Thomsult\LaravelMapbox\Response;

use Illuminate\Support\Collection;
use Thomsult\LaravelMapbox\Interfaces\MapboxResponseInterface;
use Thomsult\LaravelMapbox\Response\Common\CategoryItems;

readonly class CategoriesListResponse implements MapboxResponseInterface
{
  public function __construct(
    public Collection $list_items,
    public string $attribution,
    public string $version,
    public int $status
  ) {}

  public static function fromResponse($response): self
  {
    $data = json_decode($response->getBody()->getContents(), true);

    if (isset($data['error'])) {
      throw new \Exception($data['error']);
    }
    if (isset($data['listItems'])) {
      $list_items = collect($data['listItems'])
        ->map(fn(array $suggestion) => CategoryItems::fromArray($suggestion));
    } else {
      $list_items = collect();
    }

    return new self(
      list_items: $list_items,
      attribution: $data['attribution'] ?? '',
      version: $data['version'] ?? '',
      status: $data['status'] ?? 200
    );
  }

  public function getListItems(): Collection
  {
    return $this->list_items;
  }

  public function getFirstListItem(): ?CategoryItems
  {
    return $this->list_items->first();
  }

  public function isEmpty(): bool
  {
    return $this->list_items->isEmpty();
  }

  public function count(): int
  {
    return $this->list_items->count();
  }

  public function toArray(): array
  {
    return [
      'list_items' => $this->list_items->toArray(),
      'attribution' => $this->attribution,
      'version' => $this->version,
      'status' => $this->status
    ];
  }
}
