<?php

namespace Sfolador\Measures\Unit\Power;

use Sfolador\Measures\Unit\Measure;

/**
 * @method Power toHp() Convert to horsepower
 * @method Power toHorsePower() Convert to horsepower
 * @method Power toW() Convert to watts
 * @method Power toWatt() Convert to watts
 * @method Power toKw() Convert to kilowatts
 * @method Power toKilowatt() Convert to kilowatts
 * @method Power toMw() Convert to megawatts
 * @method Power toMegawatt() Convert to megawatts
 * @method Power toGw() Convert to gigawatts
 * @method Power toGigawatt() Convert to gigawatts
 */
class Power extends Measure
{
    public static string $unitClass = UnitsOfPower::class;
}
