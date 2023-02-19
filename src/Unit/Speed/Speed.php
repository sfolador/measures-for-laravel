<?php

namespace Sfolador\Measures\Unit\Speed;

use Sfolador\Measures\Unit\Measure;


/**
 * @method Speed toMs() Convert to meters per second
 * @method Speed toKmh() Convert to kilometers per hour
 * @method Speed toMph() Convert to miles per hour
 * @method Speed toKnots() Convert to knots
 * @method Speed toKn() Convert to knots
 * @method Speed toMetersPerSecond() Convert to meters per second
 * @method Speed toKilometersPerHour() Convert to kilometers per hour
 * @method Speed toMilesPerHour() Convert to miles per hour
 * @method Speed toFeetPerSecond() Convert to feet per second
 * @method Speed toMach() Convert to mach
 */
class Speed extends Measure
{
    public static string $unitClass = UnitsOfSpeed::class;
}
