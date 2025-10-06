<?php

namespace Thomsult\LaravelMapbox\Requests\Options\Rules;

class TypeRules
{
  public static function rules(): array
  {
    return [
      'types' => ['required', 'array'],     // le champ doit être un tableau
      'types.*' => ['string', 'in:country,region,postcode,district,place,city,locality,neighborhood,street,address,poi,category,unknown'],  // chaque élément du tableau
    ];
  }
}
