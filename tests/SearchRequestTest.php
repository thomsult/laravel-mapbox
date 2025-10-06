<?php

use Thomsult\LaravelMapbox\Enums\PlaceType;
use Illuminate\Support\Collection;
use Thomsult\LaravelMapbox\Interfaces\MapboxApiInterface;
use Thomsult\LaravelMapbox\Interfaces\MapboxClientInterface;
use Thomsult\LaravelMapbox\Interfaces\MapboxOptionsInterface;
use Thomsult\LaravelMapbox\Interfaces\MapboxRequestInterface;
use Thomsult\LaravelMapbox\Services\MapboxClient;

// Test de la construction de la requête autocomplete
test('MapboxClient autocomplete builds request as expected', function () {
    $query = 'Paris';

    $client = MapboxClient::client();
    $request = $client->autocomplete(
        fn($req) => $req
            ->query($query)
            ->options(
                fn($options) => $options
                    ->types([PlaceType::PLACE->value])
                    ->limit(2)
                    ->country('FR')
                    ->language('fr')
            )
    );

    // Vérification de la structure du builder avant le call
    expect($request)->not()->toBeNull();
    expect($request)->toBeInstanceOf(MapboxApiInterface::class);
});


test('MapboxClient autocomplete Parameters are set correctly', function () {
    $query = 'Paris';

    $client = MapboxClient::client();
    $request = $client->autocomplete(
        function ($req) use ($query) {
            $currentRequest =  $req
                ->query($query)
                ->options(
                    function ($options) {
                        return $options
                            ->types([PlaceType::PLACE->value])
                            ->limit(2)
                            ->country('FR')
                            ->language('fr');
                    }
                );
            expect($currentRequest)->toBeInstanceOf(MapboxRequestInterface::class);
            expect($currentRequest->getQuery())->toEqual(['q' => $query]);
            expect($currentRequest->getOptions())->toBeArray();
            expect($currentRequest->getMethod())->toEqual('GET');
            expect($currentRequest->getBody())->toBeEmpty();

            try {
                $currentRequest->toBatch();
            } catch (Throwable $e) {
                expect($e)->toBeInstanceOf(Throwable::class);
            }
            return $currentRequest;
        }
    );

    // Vérification de la structure du builder avant le call
    expect($request)->not()->toBeNull();
    expect($request)->toBeInstanceOf(MapboxApiInterface::class);
});


test('MapboxClient autocomplete Options are set correctly', function () {
    $query = 'Paris';

    $client = MapboxClient::client();
    $request = $client->autocomplete(
        fn($req) => $req
            ->query($query)
            ->options(
                function ($options) {
                    $currentOptions = $options
                        ->types([PlaceType::PLACE->value])
                        ->limit(2)
                        ->country('FR')
                        ->language('fr');

                    expect($currentOptions)->toBeInstanceOf(MapboxOptionsInterface::class);
                    expect($currentOptions->toArray()['types'])->toEqual(PlaceType::PLACE->value);
                    expect($currentOptions->toArray()['limit'])->toBeInt();
                    expect($currentOptions->toArray()['country'])->toBeString();
                    expect($currentOptions->toArray()['language'])->toBeString();
                    return $currentOptions;
                }
            )
    );

    // Vérification de la structure du builder avant le call
    expect($request)->not()->toBeNull();
    expect($request)->toBeInstanceOf(MapboxApiInterface::class);
});

