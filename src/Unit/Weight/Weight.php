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
 * @method Weight toGrams() Convert to grams
 * @method Weight toMilligrams() Convert to milligrams
 * @method Weight toKilograms() Convert to kilograms
 * @method Weight toPounds() Convert to pounds
 * @method Weight toOunces() Convert to ounces
 * @method Weight toTons() Convert to tons
 * @method Weight toStones() Convert to stones
 * @method Weight toShortTons() Convert to short tons
 * @method Weight toLongTons() Convert to long tons
 */
class Weight extends Measure
{
    public static string $unitClass = UnitsOfWeight::class;
}
