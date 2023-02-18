<?php

declare(strict_types=1);

namespace Sfolador\Measures\Unit\Volume;

use Sfolador\Measures\Unit\Units;

enum UnitsOfVolume: string implements Units
{
    case MILLILITER = 'ml';
    case LITER = 'l';
    case CUBIC_METER = 'm3';
    case CUBIC_INCH = 'in3';
    case CUBIC_FOOT = 'ft3';

    case GALLON = 'gal';
    case PINT = 'pt';
    case CUP = 'cup';

    public function convertToBase(float $value): float
    {
        return match ($this) {
            self::MILLILITER => $value / 1000,
            self::LITER => $value,
            self::CUBIC_METER => $value * 1000,
            self::CUBIC_INCH => $value / 61.0237441,
            self::CUBIC_FOOT => $value * 28.316846592,
            self::GALLON => $value / 0.264172052,
            self::PINT => $value / 2.11337642,
            self::CUP => $value / 4.22675284,
        };
    }

    public function convertFromBase(float $value): float
    {
        return match ($this) {
            self::MILLILITER => $value * 1000,
            self::LITER => $value,
            self::CUBIC_METER => $value / 1000,
            self::CUBIC_INCH => $value * 61.0237441,
            self::CUBIC_FOOT => $value / 28.316846592,
            self::GALLON => $value * 0.264172052,
            self::PINT => $value * 2.11337642,
            self::CUP => $value * 4.22675284,
        };
    }

    public function convert(float $value, Units $destination): float
    {
        $valueInMeters = $this->convertToBase($value);
        $value = $destination->convertFromBase($valueInMeters);

        return $value;
    }

    public function to(float $value, Units $destination): float
    {
        return $this->convert($value, $destination);
    }

    public function correctNotation(): string
    {
        return match ($this) {
            self::MILLILITER => 'ml',
            self::LITER => 'l',
            self::CUBIC_METER => 'm3',
            self::CUBIC_INCH => 'in3',
            self::CUBIC_FOOT => 'ft3',
            self::GALLON => 'gal',
            self::PINT => 'pt',
            self::CUP => 'cup',
        };
    }
}
