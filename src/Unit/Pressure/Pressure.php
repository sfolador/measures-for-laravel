<?php

namespace Sfolador\Measures\Unit\Pressure;

use Sfolador\Measures\Unit\Measure;

/**
 * @method Pressure toPascal() Convert to Pascal
 * @method Pressure toKiloPascal() Convert to KiloPascal
 * @method Pressure toMegaPascal() Convert to MegaPascal
 * @method Pressure toAtmosphere() Convert to Atmosphere
 * @method Pressure toBar() Convert to Bar
 * @method Pressure toPoundsPerSquareInch() Convert to PoundPerSquareInch
 * @method Pressure toTorr() Convert to Torr
 * @method Pressure toMillimetersOfMercury() Convert to MillimeterOfMercury
 * @method Pressure toInchesOfMercury() Convert to InchOfMercury
 * @method Pressure toPa() Convert to Pascal
 * @method Pressure toKpa() Convert to KiloPascal
 * @method Pressure toMpa() Convert to MegaPascal
 * @method Pressure toAtm() Convert to Atmosphere
 * @method Pressure toMmHg() Convert to MillimeterOfMercury
 * @method Pressure toInHg() Convert to InchOfMercury
 * @method Pressure toPsi() Convert to PoundPerSquareInch
 */
class Pressure extends Measure
{
    public static string $unitClass = UnitsOfPressure::class;
}
