<?php

namespace Sfolador\Measures\Unit;

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
}
