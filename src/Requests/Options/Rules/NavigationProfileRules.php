<?php

namespace Thomsult\LaravelMapbox\Requests\Options\Rules;

class CountryRules
{
  public static function rules(): array
  {

    return [
      'navigation_profile' => ['required', 'string', 'in:driving,walking,cycling'],
    ];
  }
}
