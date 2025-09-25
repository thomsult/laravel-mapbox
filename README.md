# Laravel Mapbox

<!-- [![Latest Version on Packagist](https://img.shields.io/packagist/v/thomsult/laravel-mapbox.svg?style=flat-square)](https://packagist.org/packages/thomsult/laravel-mapbox)
[![Total Downloads](https://img.shields.io/packagist/dt/thomsult/laravel-mapbox.svg?style=flat-square)](https://packagist.org/packages/thomsult/laravel-mapbox)
[![License](https://img.shields.io/packagist/l/thomsult/laravel-mapbox.svg?style=flat-square)](https://packagist.org/packages/thomsult/laravel-mapbox) -->

Un package Laravel élégant et typé pour intégrer les APIs Mapbox (geocoding, search, directions) dans vos applications Laravel.

## ✨ Fonctionnalités

- 🎯 **API typée** - Auto-complétion complète et type safety
- 🚀 **Fluent API** - Interface intuitive et chainable
- 🔧 **Configuration simple** - Prêt à l'emploi en quelques minutes
- 📍 **Support complet** - Search, Suggestions
- 🌍 **Multi-langues** - Support des langues et pays
- ⚡ **Laravel intégré** - Service Provider, Facade, Configuration
- 🧪 **Testé** - Tests unitaires et d'intégration

## 📋 Prérequis

- PHP 8.1+
- Laravel 12.0+
- Token d'accès Mapbox

## 🚀 Installation

Installez le package via Composer :

```bash
composer require thomsult/laravel-mapbox
```

Publiez le fichier de configuration :

```bash
php artisan vendor:publish --provider="Thomsult\LaravelMapbox\Providers\MapboxServiceProvider" --tag="config"
```

Ajoutez votre token Mapbox dans votre fichier `.env` :

```env
MAPBOX_ACCESS_TOKEN=votre_token_mapbox_ici
```

## 🔧 Configuration

Le fichier de configuration `config/mapbox.php` permet de personnaliser :

```php
return [
    'access_token' => env('MAPBOX_ACCESS_TOKEN'),
    'base_uri' => 'https://api.mapbox.com/',
    'api_version' => 'v1/',
    'search' => [
        'base_endpoint' => 'search/searchbox/',
        'forward_endpoint' => 'forward', //not implements
        'suggest_endpoint' => 'suggest',
        'retrieve_endpoint' => 'retrieve',
        'category_endpoint' => 'category', //not implements
        'list_categories_endpoint' => 'list/category' //not implements
    ],
    'cache_ttl' => 3600,
];
```

## 📖 Utilisation

### Recherche de base

```php
use Thomsult\LaravelMapbox\Facades\Mapbox;
use Thomsult\LaravelMapbox\Requests\SuggestRequest;
use Thomsult\LaravelMapbox\Request\SearchRequest;

$response = Mapbox::client()->autocomplete(
    new SearchRequest('Paris')
);

foreach ($response->getSuggestions() as $suggestion) {
    echo $suggestion->getFullName(); // "Paris, France"
}
```

### Recherche avancée avec options typées

```php
use Thomsult\LaravelMapbox\Request\Options\SearchOptions;
use Thomsult\LaravelMapbox\Enums\PlaceType;
use Thomsult\LaravelMapbox\Request\SearchRequest;

$options = new SearchOptions(
           types: [PlaceType::PLACE->value],
           limit: 2,
           country: 'FR',
           language: 'fr',
);

$response = Mapbox::client()->autocomplete(
    new SearchRequest('Par', $options)
);
```

### Utilisation des réponses

```php
$response = Mapbox::client()->autocomplete(new SearchRequest('Paris'));

// Accès aux données
echo "Trouvé : " . $response->count() . " résultats";

// Première suggestion
$first = $response->getFirstSuggestion();
if ($first) {
    echo $first->name;              // "Paris"
    echo $first->mapbox_id;         // "place.123456"

// Vérifications
if ($response->isEmpty()) {
    echo "Aucun résultat trouvé";
}
```

### Types de lieux disponibles

```php
use Thomsult\LaravelMapbox\Enums\PlaceType;

    case COUNTRY = 'country';
    case REGION = 'region';
    case POSTCODE = 'postcode';
    case DISTRICT = 'district';
    case PLACE = 'place';
    case CITY = 'city';
    case LOCALITY = 'locality';
    case NEIGHBORHOOD = 'neighborhood';
    case STREET = 'street';
    case ADDRESS = 'address';
    case POI = 'poi';
    case CATEGORY = 'category';
    case UNKNOWN = 'unknown';
```

### Options de recherche

#### Limiter par type
```php
$options = new SearchOptions(
  types: [PlaceType::PLACE->value, PlaceType::LOCALITY->value]
)
    
```

#### Limiter par pays
```php
$options = new SearchOptions(
  country: 'FR'
)
```

#### Définir une langue
```php
$options = new SearchOptions(
  language: 'fr'
)
```

#### Limiter la zone de recherche (bbox)
```php
$options = new SearchOptions(
    bbox: [
        'minLng' => 2.0,   // Longitude minimum
        'minLat' => 48.5,  // Latitude minimum
        'maxLng' => 2.5,   // Longitude maximum
        'maxLat' => 49.0   // Latitude maximum
    ]
);
```

#### Recherche de proximité
```php
$options = new SearchOptions(
    proximity: [
        'longitude' => 2.3522,  // Longitude du centre de Paris
        'latitude' => 48.8566   // Latitude du centre de Paris
    ]
);  
```

#### Autres options
```php
$options = new SearchOptions(
    limit: 5,
    autocomplete: true
);
```

### Utilisation dans des commandes Artisan

```php
Artisan::command('mapbox:test', function () {
    $response = Mapbox::client()->autocomplete(
        new SuggestRequest('Paris', 
            new SearchOptions(
                limit: 3
            )
        )
    );
    
    $this->info("Trouvé {$response->count()} suggestions :");
    
    foreach ($response->getSuggestions() as $suggestion) {
        $this->line("📍 {$suggestion->getFullName()}");
    }
});
```
## 📚 API Reference

### Classes principales

- **`Mapbox`** - Facade principale
- **`SuggestRequest`** - Requête de suggestion
- **`SearchOptions`** - Options de recherche typées
- **`SearchMapboxResponse`** - Réponse de l'API
- **`Suggestion`** - Suggestion individuelle
- **`PlaceType`** - Enum des types de lieux

### Méthodes utiles

#### SearchMapboxResponse
- `getSuggestions()` - Collection de suggestions
- `getFirstSuggestion()` - Première suggestion
- `count()` - Nombre de résultats
- `isEmpty()` - Vérifier si vide

#### Suggestion
- `getFullName()` - Nom complet avec localisation

## 🤝 Contribution

Les contributions sont les bienvenues ! Merci de :

1. Fork le projet
2. Créer une branche pour votre fonctionnalité
3. Commiter vos changements
4. Pousser vers la branche
5. Créer une Pull Request

## 📄 Licence

Ce package est sous licence MIT. Voir le fichier [LICENSE](LICENSE) pour plus de détails.

## 🙏 Remerciements

- [Mapbox](https://www.mapbox.com/) pour leur excellente API
- [Laravel](https://laravel.com/) pour le framework
- La communauté open source

## 📞 Support

- 🐛 [Signaler un bug](https://github.com/thomsult/laravel-mapbox/issues)
- 💡 [Demander une fonctionnalité](https://github.com/thomsult/laravel-mapbox/issues)
- 📖 [Documentation](https://github.com/thomsult/laravel-mapbox/blob/main/README.md)

---

Créé avec ❤️ par [Sultan Thomas](https://github.com/thomsult)