<?php

namespace Sfolador\Measures\Facades;

use Illuminate\Support\Facades\Facade;
use Sfolador\Measures\MeasuresInterface;

class Measures extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return MeasuresInterface::class;
    }
}
