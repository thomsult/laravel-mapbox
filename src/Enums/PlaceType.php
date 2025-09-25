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
}