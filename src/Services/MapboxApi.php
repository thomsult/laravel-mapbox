<?php

namespace Thomsult\LaravelMapbox\Services;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\TransferStats;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\RateLimiter;
use Thomsult\LaravelMapbox\Builder\UrlBuilder;
use Thomsult\LaravelMapbox\Interfaces\MapboxApiInterface;
use Thomsult\LaravelMapbox\Interfaces\MapboxResponseInterface;
use Thomsult\LaravelMapbox\Services\Api\GeocodingAPI;
use Thomsult\LaravelMapbox\Services\Api\SearchBoxAPI;
use Throwable;

class MapboxApi extends Client implements MapboxApiInterface
{
  use SearchBoxAPI;
  use GeocodingAPI;

  private object $requestConfig;
  private array $requestAuthConfig = [];
  private string $responseClass;
  private ?MapboxResponseInterface $cachedResponse = null;

  public function __construct(
    private string $session_token,
    private string $access_token,
    public UrlBuilder $urlBuilder,
    array $config = []
  ) {
    parent::__construct([
      'timeout' => config('mapbox.cache.timeout', 5.0),
      ...$config,
    ]);
  }

  /** 🔑 Authentification complète (session + token) */
  public function getAuthSessionToken(): array
  {
    return array_merge($this->getSessionToken(), $this->getAccessToken());
  }

  private function getSessionToken(): array
  {
    return ['session_token' => $this->session_token];
  }

  private function getAccessToken(): array
  {
    return ['access_token' => $this->access_token];
  }

  /**
   * 🧠 Appelle l'API Mapbox avec cache + rate limit + lock
   */
  public function call(): MapboxResponseInterface|Throwable
  {
    if (!isset($this->requestConfig, $this->responseClass)) {
      throw new \Exception('Configuration de requête ou classe de réponse manquante.');
    }

    // ⚙️ 1. Limite le nombre d’appels
    if (config('mapbox.rate.enabled')) {
      $this->rateLimitRequest();
    }

    // 🧠 2. Gestion du cache + verrou
    $cacheKey = $this->generateCacheKey();
    $lockKey = 'lock_' . $cacheKey;
    $lock = Cache::lock($lockKey, 10); // verrou de 10 secondes

    try {
      // ⏳ Attend jusqu’à 5 secondes si une autre requête identique est en cours
      $lock->block(5, function () use ($cacheKey) {
        if (config('mapbox.cache.enabled')) {
          $this->cachedResponse = Cache::remember(
            $cacheKey,
            now()->addMinutes(config('mapbox.cache.duration', 15)),
            fn() => $this->makeRequest()
          );
        } else {
          $this->cachedResponse = $this->makeRequest();
        }
      });

      // 🔁 Retourne la réponse du cache ou celle exécutée
      return $this->cachedResponse ?? Cache::get($cacheKey);
    } catch (Throwable $e) {
      throw new \Exception('Erreur lors de l’appel à Mapbox : ' . $e->getMessage(), 0, $e);
    } finally {
      // 🔓 Libère toujours le verrou
      optional($lock)->release();
    }
  }

  /**
   * ⚡ Empêche le spam : limite les requêtes par minute
   */
  private function rateLimitRequest(): void
  {
    $rateKey = 'mapbox_api_limit';
    $maxAttempts = config('mapbox.rate.limit', 60);
    $decay = config('mapbox.rate.decay', 60); // secondes

    if (RateLimiter::tooManyAttempts($rateKey, $maxAttempts)) {
      $seconds = RateLimiter::availableIn($rateKey);
      throw new \Exception("Trop de requêtes à Mapbox. Réessayez dans {$seconds} secondes.");
    }

    RateLimiter::hit($rateKey, $decay);
  }

  /**
   * 🧩 Exécute l’appel GuzzleHttp
   */
  private function makeRequest(): MapboxResponseInterface|Throwable
  {
    $method = strtoupper($this->requestConfig->getMethod());
    $uri = $this->requestConfig->getUri();

    $options = [
      'query' => array_merge(
        $this->requestConfig->getQuery() ?? [],
        $this->requestConfig->getOptions() ?? [],
        $this->requestAuthConfig
      ),
      'headers' => [
        'Content-Type' => $method === 'POST'
          ? 'application/json'
          : 'application/x-www-form-urlencoded',
      ],
    ];

    if (config('mapbox.debug')) {
      $options['on_stats'] = function (TransferStats $stats) {
        echo "URL envoyée : " . $stats->getEffectiveUri() . "\n";
      };
    }

    if ($method === 'POST') {
      if (!empty($this->requestConfig->getBody())) {
        $options['body'] = json_encode($this->requestConfig->getBody());
      } else {
        throw new \Exception('Body is required for POST requests');
      }
    }

    $response = $this->request($method, $uri, $options);

    if ($response->getStatusCode() !== 200) {
      throw new \Exception('Mapbox API request failed: ' . $response->getReasonPhrase());
    }

    return $this->responseClass::fromResponse($response);
  }

  /**
   * 🧮 Génère une clé unique pour le cache/lock
   */
  private function generateCacheKey(): string
  {
    $data = [
      'method' => $this->requestConfig->getMethod(),
      'uri' => $this->requestConfig->getUri(),
      'query' => $this->requestConfig->getQuery(),
      'body' => $this->requestConfig->getBody(),
      'options' => $this->requestConfig->getOptions(),
    ];

    return 'mapbox_' . md5(json_encode($data));
  }
}
