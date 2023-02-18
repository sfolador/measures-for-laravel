<?php

declare(strict_types=1);

namespace Sfolador\Measures\Unit\Volume;

use Sfolador\Measures\Unit\Measure;

/**
 * @method Volume toMl() Convert to milliliters
 * @method Volume toL() Convert to liters
 * @method Volume toM3() Convert to cubic meters
 * @method Volume toFt3() Convert to cubic feet
 * @method Volume toIn3() Convert to cubic inches
 * @method Volume toGal() Convert to gallons
 * @method Volume toPt() Convert to pints
 * @method Volume toCup() Convert to cups
 * @method Volume toMilliliters() Convert to milliliters
 * @method Volume toLiters() Convert to liters
 * @method Volume toCubicMeters() Convert to cubic meters
 * @method Volume toCubicFeet() Convert to cubic feet
 * @method Volume toCubicInches() Convert to cubic inches
 * @method Volume toGallons() Convert to gallons
 * @method Volume toPints() Convert to pints
 * @method Volume toCups() Convert to cups
 */
class Volume extends Measure
{
    public static string $unitClass = UnitsOfVolume::class;
}
