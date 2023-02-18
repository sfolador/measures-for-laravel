<?php

namespace Sfolador\Measures\Unit\Weight;

use Illuminate\Support\Str;
use Sfolador\Measures\Unit\Measure;
use Sfolador\Measures\Unit\Units;

class Weight extends Measure
{
    public static function extractUnit(mixed $expression): mixed
    {
        if (is_string($expression)) {
            $expression = Str::of($expression)->trim()->lower()->squish()->value();

            return UnitsOfWeight::from($expression);
        }

        if ($expression instanceof Units) {
            return $expression;
        }
        //maybe throw new Exception('Invalid unit');
        return null;
    }
}
