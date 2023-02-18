<?php

declare(strict_types=1);

namespace Sfolador\Measures\Unit\Length;

use Illuminate\Support\Str;
use Sfolador\Measures\Unit\Measure;
use Sfolador\Measures\Unit\Units;
use Sfolador\Measures\Unit\UnitsOfLength;

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

    public function __call(string $name, array $arguments)
    {
        if (Str::startsWith($name, 'to')) {
            $unit = Str::of($name)->after('to')->lower()->value();

            return $this->to($unit);
        }
    }
}
