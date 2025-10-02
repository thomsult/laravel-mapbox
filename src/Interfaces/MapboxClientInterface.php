<?php

namespace Thomsult\LaravelMapbox\Interfaces;


interface MapboxClientInterface
{
    public static function client(): MapboxApiInterface;
}
