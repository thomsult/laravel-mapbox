<?php

namespace Thomsult\LaravelMapbox\Requests\Options\Rules;

class CountryRules
{
  public static function rules(): array
  {
    // A comma-separated list of ISO 3166 alpha 2 country codes.
    return [
      'country' => ['required', 'string', 'max:2'],
    ];
  }
}
