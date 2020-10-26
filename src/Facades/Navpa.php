<?php

namespace Naykel\Navpa\Facades;

use Illuminate\Support\Facades\Facade;

class Navpa extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor(): string
    {
        return 'navpa';
    }
}
