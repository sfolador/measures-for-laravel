<?php

namespace Sfolador\Measures\Unit\Temperature;

use Illuminate\Support\Str;
use Sfolador\Measures\Unit\Measure;
use Sfolador\Measures\Unit\Units;

/**
 * @method Temperature toCelsius()
 * @method Temperature toFahrenheit()
 * @method Temperature toKelvin()
 * @method Temperature toCdeg()
 * @method Temperature toFdeg()
 * @method Temperature toKdeg()
 */
class Temperature extends Measure
{
    public static string $unitClass = UnitsOfTemperature::class;

    public static function detectUnit(string $expression): ?Units
    {
        if (! empty($expression)) {
            $expression = Str::of($expression)->trim()->lower()->squish()->value();

            if (Str::of($expression)->contains('º')) {
                $expression = Str::of($expression)->replace('º', '')->append('deg')->value();
            }
        }

        return parent::detectUnit($expression);
    }
}
