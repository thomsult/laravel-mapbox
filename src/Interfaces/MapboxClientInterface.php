<?php

namespace Thomsult\LaravelMapbox\Interfaces;


interface MapboxClientInterface
{
    /**
     * @return MapboxApiInterface
     */
    public static function client(): MapboxApiInterface;
}
