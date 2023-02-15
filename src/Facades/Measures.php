<?php

namespace Sfolador\Measures\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Sfolador\Measures\Measures
 */
class Measures extends Facade
{
    protected static function getFacadeAccessor()
    {
        return \Sfolador\Measures\Measures::class;
    }
}
