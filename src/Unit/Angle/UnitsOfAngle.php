<?php

namespace Sfolador\Measures\Unit\Angle;

use InvalidArgumentException;
use Sfolador\Measures\Unit\Traits\ConversionFactor;
use Sfolador\Measures\Unit\Units;

enum UnitsOfAngle: string implements Units
{
    use ConversionFactor;

    case RADIAN = 'rad';
    case DEGREE = 'deg';

    public function conversionFactor(): float
    {
        return match ($this) {
            self::RADIAN => 1,
            self::DEGREE => 0.017453292519943,
        };
    }

    public function toStringNotation(): string
    {
        return match ($this) {
            self::RADIAN => 'rad',
            self::DEGREE => 'º',
        };
    }

    public static function extendedValues(string $unitName): Units
    {
        return match ($unitName) {
            'radian','radians' => self::RADIAN,
            'degree', 'degrees' => self::DEGREE,
            default => throw new InvalidArgumentException('Invalid unit name'),
        };
    }
}
