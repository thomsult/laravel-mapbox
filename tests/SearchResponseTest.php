<?php

use Thomsult\LaravelMapbox\Enums\PlaceType;
use Illuminate\Support\Collection;
use Tests\TestCase;
use Thomsult\LaravelMapbox\Interfaces\MapboxApiInterface;
use Thomsult\LaravelMapbox\Interfaces\MapboxClientInterface;
use Thomsult\LaravelMapbox\Interfaces\MapboxOptionsInterface;
use Thomsult\LaravelMapbox\Interfaces\MapboxRequestInterface;
use Thomsult\LaravelMapbox\Interfaces\MapboxResponseInterface;
use Thomsult\LaravelMapbox\Services\MapboxClient;

// Test de la construction de la requête autocomplete

test('MapboxClient autocomplete response are set correctly', function () {
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

    $response = $request->call();
    expect($response)->not()->toBeNull();
    expect($response)->toBeInstanceOf(MapboxResponseInterface::class);
});
