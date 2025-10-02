<?php

namespace Thomsult\LaravelMapbox\Enums;


enum PlaceType: string
{
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


    public static function fromValue(string $value): self
    {
        return match ($value) {
            'country' => self::COUNTRY,
            'region' => self::REGION,
            'postcode' => self::POSTCODE,
            'district' => self::DISTRICT,
            'place' => self::PLACE,
            'city' => self::CITY,
            'locality' => self::LOCALITY,
            'neighborhood' => self::NEIGHBORHOOD,
            'street' => self::STREET,
            'address' => self::ADDRESS,
            'poi' => self::POI,
            'category' => self::CATEGORY,
            default => self::UNKNOWN,
        };
    }
}
