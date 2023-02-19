<?php

declare(strict_types=1);

namespace Sfolador\Measures\Unit\Length;

use Sfolador\Measures\Unit\Measure;

/**
 * @method Length toM() Convert to meters
 * @method Length toCm() Convert to centimeters
 * @method Length toMm() Convert to millimeters
 * @method Length toKm() Convert to kilometers
 * @method Length toIn() Convert to inches
 * @method Length toFt() Convert to feet
 * @method Length toYd() Convert to yards
 * @method Length toMi() Convert to miles
 * @method Length toNmi() Convert to nautical miles
 * @method Length toMeters() Convert to meters
 * @method Length toCentimeters() Convert to centimeters
 * @method Length toMillimeters() Convert to millimeters
 * @method Length toKilometers() Convert to kilometers
 * @method Length toInches() Convert to inches
 * @method Length toFeet() Convert to feet
 * @method Length toYards() Convert to yards
 * @method Length toMiles() Convert to miles
 * @method Length toNauticalMiles() Convert to nautical miles
 */
final class Length extends Measure
{
    public static string $unitClass = UnitsOfLength::class;
}
