<?php

namespace Thomsult\LaravelMapbox\Requests\Options;

use ArrayIterator;

abstract class AbstractOption
{
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
}
