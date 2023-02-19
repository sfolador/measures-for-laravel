<?php

declare(strict_types=1);

namespace Sfolador\Measures\Unit\Volume;

use InvalidArgumentException;
use Sfolador\Measures\Unit\Traits\ConversionFactor;
use Sfolador\Measures\Unit\Units;

enum UnitsOfVolume: string implements Units
{
    use ConversionFactor;
    case MILLILITER = 'ml';
    case LITER = 'l';
    case CUBIC_METER = 'm3';
    case CUBIC_INCH = 'in3';
    case CUBIC_FOOT = 'ft3';

    case GALLON = 'gal';
    case PINT = 'pt';
    case CUP = 'cup';

    public function conversionFactor(): float
    {
        return match ($this) {
            self::MILLILITER => 1 / 1000,
            self::LITER => 1,
            self::CUBIC_METER => 1000,
            self::CUBIC_INCH => 1 / 61.0237441,
            self::CUBIC_FOOT => 28.316846592,
            self::GALLON => 1 / 0.264172052,
            self::PINT => 1 / 2.11337642,
            self::CUP => 1 / 4.22675284
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

    public function toStringNotation(): string
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

    public static function extendedValues(string $unitName): Units
    {
        return match ($unitName) {
            'millilitres','milliliters' => self::MILLILITER,
            'litres','liters' => self::LITER,
            'cubicmeters' => self::CUBIC_METER,
            'cubicinches' => self::CUBIC_INCH,
            'cubicfeet' => self::CUBIC_FOOT,
            'gallons' => self::GALLON,
            'pints' => self::PINT,
            'cups' => self::CUP,
            default => throw new InvalidArgumentException('Invalid unit name'),
        };
    }
}
