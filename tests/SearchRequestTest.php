<?php

use Thomsult\LaravelMapbox\Request\SearchRequest;
use Thomsult\LaravelMapbox\Request\Options\SearchOptions;
use Thomsult\LaravelMapbox\Response\SearchMapboxResponse;
use Illuminate\Support\Collection;


test('SearchRequest can be instantiated', function () {
    $options = null; // ou new Thomsult\LaravelMapbox\Request\Options\SearchOptions(...)
    $request = new SearchRequest('Paris', $options);
    expect($request)->toBeInstanceOf(SearchRequest::class);
});


test('SearchRequest returns correct query and options as array', function () {
    $options = new SearchOptions(
        types: ['place', 'address'],
        limit: 5,
        country: 'fr',
        language: 'fr',
        proximity: '2.3522,48.8566',
        bbox: '2.0,48.0,3.0,49.0',
        poi_category: 'cafe',
        poi_category_exclusions: 'bar',
        eta_type: 'driving',
        navigation_profile: 'car',
        origin: '2.3333,48.8666',
    );
    $request = new SearchRequest('Tour Eiffel', $options);
    expect($request->getQuery())->toBe('Tour Eiffel');
    $array = $request->getOptions();
    expect($array)->toBeArray();
    expect($array['types'])->toBeString();
    expect($array['limit'])->toBeNumeric()->toBeGreaterThan(0)->toBeLessThanOrEqual(10);
    expect($array['country'])->toBeString();
    expect($array['language'])->toBeString();
    expect($array['proximity'])->toBeString();
    expect($array['bbox'])->toBeString();
    expect($array['poi_category'])->toBeString();
    expect($array['poi_category_exclusions'])->toBeString();
    expect($array['eta_type'])->toBeString();
    expect($array['navigation_profile'])->toBeString();
    expect($array['origin'])->toBeString();
});



test('SearchRequest with response: SearchMapboxResponse hydration', function () {
    // Simule une réponse HTTP Mapbox
    $fakeResponse = new class {
        public function getBody() {
            return new class {
                public function getContents() {
                    return json_encode([
                        'suggestions' => [
                            [
                                'name' => 'Tour Eiffel',
                                'mapbox_id' => 'mbx123',
                                'feature_type' => 'poi',
                                'place_formatted' => 'Champ de Mars, 5 Avenue Anatole France, 75007 Paris, France',
                                'language' => 'fr',
                            ]
                        ],
                        'attribution' => 'Mapbox',
                        'response_id' => 'resp-1',
                        'status' => 200
                    ]);
                }
            };
        }
    };

    $response = SearchMapboxResponse::fromResponse($fakeResponse);
    expect($response)->toBeInstanceOf(SearchMapboxResponse::class);
    expect($response->isEmpty())->toBeFalse();
    expect($response->count())->toBe(1);
    $suggestion = $response->getFirstSuggestion();
    expect($suggestion)->not()->toBeNull();
    expect($suggestion->name)->toBeString();
    expect($suggestion->mapbox_id)->toBeString();
    expect($suggestion->feature_type->value)->toBeString();
    expect($suggestion->place_formatted)->toBeString();
    expect($response->attribution)->toBeString();
    expect($response->responseId)->toBeString();
    expect($response->status)->toBeNumeric();
});
