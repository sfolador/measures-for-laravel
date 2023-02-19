<?php

namespace Sfolador\Measures\Unit\Temperature;

use Sfolador\Measures\Unit\Measure;

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
}
