<?php

namespace Sfolador\Measures\Unit\Weight;

use Sfolador\Measures\Unit\Measure;

/**
 * @method Weight toG() Convert to grams
 * @method Weight toMg() Convert to milligrams
 * @method Weight toKg() Convert to kilograms
 * @method Weight toLb() Convert to pounds
 * @method Weight toOz() Convert to ounces
 * @method Weight toT() Convert to tons
 * @method Weight toSt() Convert to stones
 * @method Weight toTon() Convert to short tons
 * @method Weight toLton() Convert to long tons
 */
class Weight extends Measure
{
    public static string $unitClass = UnitsOfWeight::class;
}
