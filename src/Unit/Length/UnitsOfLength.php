<?php

namespace Sfolador\Measures\Unit\Length;

use InvalidArgumentException;
use Sfolador\Measures\Unit\Units;

enum UnitsOfLength: string implements Units
{
    case METER = 'm';
    case CENTIMETER = 'cm';
    case MILLIMETER = 'mm';
    case KILOMETER = 'km';
    case INCH = 'in';
    case FOOT = 'ft';

    case YARD = 'yd';
    case MILE = 'mi';
    case NAUTICAL_MILE = 'nmi';

    public function to(float $value, Units $destination): float
    {
        return $this->convert($value, $destination);
    }

    public function convert(float $value, Units $destination): float
    {
        $valueInMeters = $this->convertToBase($value);
        $value = $destination->convertFromBase($valueInMeters);

        return $value;
    }

    public function convertToBase(float $value): float
    {
        return match ($this) {
            self::METER => $value,
            self::CENTIMETER => $value / 100,
            self::MILLIMETER => $value / 1000,
            self::KILOMETER => $value * 1000,
            self::INCH => $value * 0.0254,
            self::FOOT => $value * 0.3048,
            self::YARD => $value * 0.9144,
            self::MILE => $value * 1609.344,
            self::NAUTICAL_MILE => $value * 1852,
        };
    }

    public function convertFromBase(float $value): float
    {
        return match ($this) {
            self::METER => $value,
            self::CENTIMETER => $value * 100,
            self::MILLIMETER => $value * 1000,
            self::KILOMETER => $value / 1000,
            self::INCH => $value / 0.0254,
            self::FOOT => $value / 0.3048,
            self::YARD => $value / 0.9144,
            self::MILE => $value / 1609.344,
            self::NAUTICAL_MILE => $value / 1852,
        };
    }

    public function correctNotation(): string
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
            'nautical_miles' => self::NAUTICAL_MILE,
            default => throw new InvalidArgumentException('Invalid unit name'),
        };
    }
}
