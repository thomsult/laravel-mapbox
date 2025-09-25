<?php

namespace Thomsult\LaravelMapbox\Response;

use Illuminate\Support\Collection;
use Thomsult\LaravelMapbox\Response\Suggestions\Suggestion;

readonly class SearchMapboxResponse
{
    /** @param Collection<int, Suggestion> $suggestions */
    public function __construct(
        public Collection $suggestions,
        public string $attribution,
        public string $responseId,
        public int $status
    ) {}

    public static function fromResponse( $response): self
    {
        $data = json_decode($response->getBody()->getContents(), true);
        if (isset($data['error'])) {
            throw new \Exception($data['error']);
        }
        if (isset($data['suggestions'])) {
            $suggestions = collect($data['suggestions'])
                ->map(fn(array $suggestion) => Suggestion::fromArray($suggestion));
        } else {
            $suggestions = collect();
        }

        return new self(
            suggestions: $suggestions,
            attribution: $data['attribution'] ?? '',
            responseId: $data['response_id'] ?? '',
            status: $data['status'] ?? 200
        );
    }

    public function getSuggestions(): Collection
    {
        return $this->suggestions;
    }

    public function getFirstSuggestion(): ?Suggestion
    {
        return $this->suggestions->first();
    }

    public function isEmpty(): bool
    {
        return $this->suggestions->isEmpty();
    }

    public function count(): int
    {
        return $this->suggestions->count();
    }

    public function toArray(): array
    {
        return [
            'suggestions' => $this->suggestions->toArray(),
            'attribution' => $this->attribution,
            'response_id' => $this->responseId,
            'status' => $this->status
        ];
    }
}