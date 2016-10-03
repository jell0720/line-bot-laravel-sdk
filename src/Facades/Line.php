<?php

namespace Jordanator\LineBot;

use Illuminate\Support\Facades\Facade;

class Line extends Facade
{
    /**
     * Get the registered name of the component
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'Line';
    }
}