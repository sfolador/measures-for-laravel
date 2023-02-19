<?php

namespace Sfolador\Measures\Unit\Area;

use Sfolador\Measures\Unit\Measure;

/**
 * @method Area toSquareMeters() Convert to square meters
 * @method Area toSquareCentimeters() Convert to square centimeters
 * @method Area toSquareMillimeters() Convert to square millimeters
 * @method Area toSquareKilometers() Convert to square kilometers
 * @method Area toSquareInches() Convert to square inches
 * @method Area toSquareFeet() Convert to square feet
 * @method Area toSquareYards() Convert to square yards
 * @method Area toSquareMiles() Convert to square miles
 * @method Area toHectares() Convert to hectares
 * @method Area toAcres() Convert to acres
 * @method Area toM2() Convert to square meters
 * @method Area toCm2() Convert to square centimeters
 * @method Area toMm2() Convert to square millimeters
 * @method Area toKm2() Convert to square kilometers
 * @method Area toIn2() Convert to square inches
 * @method Area toFt2() Convert to square feet
 * @method Area toYd2() Convert to square yards
 * @method Area toMi2() Convert to square miles
 * @method Area toHa() Convert to hectares
 * @method Area toAc() Convert to acres
 */
class Area extends Measure
{
    public static string $unitClass = UnitsOfArea::class;
}
