<?php

declare(strict_types=1);

namespace Sfolador\Measures\Unit\Length;

use Illuminate\Support\Str;
use Sfolador\Measures\Unit\Measure;
use Sfolador\Measures\Unit\Units;

final class Length extends Measure
{
    public static function extractUnit(mixed $expression): mixed
    {
        if (is_string($expression)) {
            $expression = Str::of($expression)->trim()->lower()->squish()->value();

            return UnitsOfLength::from($expression);
        }

        if ($expression instanceof Units) {
            return $expression;
        }
        //maybe throw new Exception('Invalid unit');
        return null;
    }
}
