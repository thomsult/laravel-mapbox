<?php

namespace Thomsult\LaravelMapbox\Requests\Options;

use ArrayIterator;
use Illuminate\JsonSchema\Types\Type;
use Illuminate\Support\Facades\Validator;
use Thomsult\LaravelMapbox\Requests\Options\Rules\CountryRules;
use Thomsult\LaravelMapbox\Requests\Options\Rules\TypeRules;

abstract class AbstractOption
{
    protected ?string $language = null;

    protected array $globalsRules = [
        'types' => TypeRules::class,
        'country' => CountryRules::class
        'navigation_profile' => NavigationProfileRules::class
    ];

    public function toArray(): array
    {
        $vars = get_object_vars($this); // toutes les propriétés privées de l’instance


        $options = [];

        foreach ($vars as $key => $value) {
            if ($value === null) {
                continue; // on ignore les champs vides
            }

            // si c’est un tableau (ex: types), on l’implose automatiquement
            if (is_array($value)) {
                $options[$key] = implode(',', $value);
            } else {
                $options[$key] = $value;
            }
        }

        return $options;
    }
    public function language(string $language): self
    {
        $this->validate($language, 'language', ['required', 'string', 'max:2']);

        $this->language = $language;
        return $this;
    }

    protected function validate($value, string $property, $rules): void
    {
        if (empty($rules) || !is_array($rules)) {
            throw new \InvalidArgumentException("Validation rules are required.");
        }
        if (empty($value)) {
            throw new \InvalidArgumentException("The $property field is required.");
        }
        if (array_key_exists($property, $this->globalsRules)) {
            $propertyRules = $this->globalsRules[$property]::rules();
            $validator = Validator::make([$property => $value], $propertyRules);
        } elseif (!empty($rules)) {
            $validator = Validator::make([$property => $value], [
                $property => $rules
            ]);
        }

        if ($validator->fails()) {
            throw new \InvalidArgumentException($validator->errors());
        }
    }
}
