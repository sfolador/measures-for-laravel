<?php

namespace Sfolador\Measures\Unit\Energy;

use Sfolador\Measures\Unit\Measure;

/**
 * @method Energy toJoule() Convert to Joule
 * @method Energy toKilojoule() Convert to Kilojoule
 * @method Energy toMegajoule() Convert to Megajoule
 * @method Energy toGigajoule() Convert to Gigajoule
 * @method Energy toCalorie() Convert to Calorie
 * @method Energy toKilocalorie() Convert to Kilocalorie
 * @method Energy toMegacalorie() Convert to Megacalorie
 * @method Energy toGigacalorie() Convert to Gigacalorie
 * @method Energy toJ() Convert to Joule
 * @method Energy toKj() Convert to Kilojoule
 * @method Energy toMj() Convert to Megajoule
 * @method Energy toGj() Convert to Gigajoule
 * @method Energy toCal() Convert to Calorie
 * @method Energy toKcal() Convert to Kilocalorie
 * @method Energy toMcal() Convert to Megacalorie
 * @method Energy toGcal() Convert to Gigacalorie
 * @method Energy toKwh() Convert to KilowattHour
 * @method Energy toMwh() Convert to MegawattHour
 * @method Energy toGwh() Convert to GigawattHour
 * @method Energy toKilowattHour() Convert to KilowattHour
 * @method Energy toMegawattHour() Convert to MegawattHour
 * @method Energy toGigawattHour() Convert to GigawattHour
 * @method Energy toEv() Convert to ElectronVolt
 * @method Energy toKev() Convert to KiloElectronVolt
 * @method Energy toMev() Convert to MegaElectronVolt
 * @method Energy toGev() Convert to GigaElectronVolt
 */
class Energy extends Measure
{
    public static string $unitClass = UnitsOfEnergy::class;
}
