<?php

namespace Sfolador\Measures\Unit\Length;

use InvalidArgumentException;
use Sfolador\Measures\Unit\Traits\ConversionFactor;
use Sfolador\Measures\Unit\Units;

enum UnitsOfLength: string implements Units
{
    use ConversionFactor;

    case METER = 'm';
    case CENTIMETER = 'cm';
    case MILLIMETER = 'mm';
    case KILOMETER = 'km';
    case INCH = 'in';
    case FOOT = 'ft';

    case YARD = 'yd';
    case MILE = 'mi';
    case NAUTICAL_MILE = 'nmi';



    public function conversionFactor(): float
    {
        return match ($this) {
            self::METER => 1,
            self::CENTIMETER => 1 / 100,
            self::MILLIMETER => 1 / 1000,
            self::KILOMETER => 1000,
            self::INCH => 0.0254,
            self::FOOT => 0.3048,
            self::YARD => 0.9144,
            self::MILE => 1609.344,
            self::NAUTICAL_MILE => 1852,
        };
    }

    public function toStringNotation(): string
    {
        return match ($this) {
            self::METER => 'm',
            self::CENTIMETER => 'cm',
            self::MILLIMETER => 'mm',
            self::KILOMETER => 'Km',
            self::INCH => 'in',
            self::FOOT => 'ft',
            self::YARD => 'yd',
            self::MILE => 'mi',
            self::NAUTICAL_MILE => 'nmi',
        };
    }

    public static function extendedValues(string $unitName): self
    {
        return match ($unitName) {
            'meters' => self::METER,
            'centimeters' => self::CENTIMETER,
            'millimeters' => self::MILLIMETER,
            'kilometers' => self::KILOMETER,
            'inches' => self::INCH,
            'feet' => self::FOOT,
            'yards' => self::YARD,
            'miles' => self::MILE,
            'nautical_miles','nautical miles' => self::NAUTICAL_MILE,
            default => throw new InvalidArgumentException('Invalid unit name'),
        };
    }
}
