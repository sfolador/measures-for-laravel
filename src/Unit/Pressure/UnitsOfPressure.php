<?php

namespace Sfolador\Measures\Unit\Pressure;

use InvalidArgumentException;
use Sfolador\Measures\Unit\Traits\ConversionFactor;
use Sfolador\Measures\Unit\Units;

enum UnitsOfPressure: string implements Units
{
    use ConversionFactor;

    case BAR = 'bar';
    case MBAR = 'mbar';
    case PASCAL = 'pa';
    case KILOPASCAL = 'kpa';
    case MEGAPASCAL = 'mpa';
    case PSI = 'psi';
    case ATMOSPHERE = 'atm';
    case TORR = 'torr';
    case MMHG = 'mmhg';
    case INHG = 'inhg';

    public function conversionFactor(): float
    {
        return match ($this) {
            self::BAR => 1,
            self::MBAR => 1 / 1000.0,
            self::PASCAL => 1 / 100000.0,
            self::KILOPASCAL => 1 / 100.0,
            self::MEGAPASCAL => 10.0,
            self::PSI => 0.0689476,
            self::ATMOSPHERE => 1.01325,
            self::TORR, self::MMHG => 0.0013332237,
            self::INHG => 0.0338639,
        };
    }

    public function toStringNotation(): string
    {
        return match ($this) {
            self::BAR => 'bar',
            self::MBAR => 'mbar',
            self::PASCAL => 'Pa',
            self::KILOPASCAL => 'kPa',
            self::MEGAPASCAL => 'MPa',
            self::PSI => 'psi',
            self::ATMOSPHERE => 'atm',
            self::TORR => 'torr',
            self::MMHG => 'mmHg',
            self::INHG => 'inHg',
        };
    }

    public static function extendedValues(string $unitName): Units
    {
        return match ($unitName) {
            'bars' => self::BAR,
            'millibars', 'millibar' => self::MBAR,
            'pascals','pascal' => self::PASCAL,
            'kilopascals','kilo pascals','kilopascal' => self::KILOPASCAL,
            'megapascals','mega pascals','megapascal' => self::MEGAPASCAL,
            'pounds per square inch', 'pounds_per_square_inch', 'poundspersquareinch','poundpersquareinch' => self::PSI,
            'atmospheres','atmosphere' => self::ATMOSPHERE,
            'torrs' => self::TORR,
            'millimeters of mercury', 'millimeters_of_mercury', 'millimetersofmercury','millimeterofmercury' => self::MMHG,
            'inches of mercury', 'inches_of_mercury', 'inchesofmercury' => self::INHG,
            default => throw new InvalidArgumentException('Invalid unit name: '.$unitName),
        };
    }
}
