<?php

namespace Sfolador\Measures\Unit\Area;

use InvalidArgumentException;
use Sfolador\Measures\Unit\Units;

enum UnitsOfArea: string implements Units
{
    case SQUARE_METER = 'm2';
    case SQUARE_KILOMETER = 'km2';

    case SQUARE_CENTIMETER = 'cm2';
    case SQUARE_MILLIMETER = 'mm2';

    case SQUARE_INCH = 'in2';
    case SQUARE_FOOT = 'ft2';
    case SQUARE_YARD = 'yd2';
    case SQUARE_MILE = 'mi2';

    case ACRE = 'ac';
    case HECTARE = 'ha';

    public function convertFromBase(float $value): float
    {
        return match ($this) {
            self::SQUARE_METER => $value,
            self::SQUARE_KILOMETER => $value / 1000000,
            self::SQUARE_CENTIMETER => $value * 10000,
            self::SQUARE_MILLIMETER => $value * 1000000,
            self::SQUARE_INCH => $value / 0.00064516,
            self::SQUARE_FOOT => $value / 0.09290304,
            self::SQUARE_YARD => $value / 0.83612736,
            self::SQUARE_MILE => $value / 2589988.110336,
            self::ACRE => $value / 4046.8564224,
            self::HECTARE => $value / 10000,
        };
    }

    public function convertToBase(float $value): float
    {
        return match ($this) {
            self::SQUARE_METER => $value,
            self::SQUARE_KILOMETER => $value * 1000000,
            self::SQUARE_CENTIMETER => $value / 10000,
            self::SQUARE_MILLIMETER => $value / 1000000,
            self::SQUARE_INCH => $value * 0.00064516,
            self::SQUARE_FOOT => $value * 0.09290304,
            self::SQUARE_YARD => $value * 0.83612736,
            self::SQUARE_MILE => $value * 2589988.110336,
            self::ACRE => $value * 4046.8564224,
            self::HECTARE => $value * 10000,
        };
    }

    public function to(float $value, Units $destination): float
    {
        return $this->convert($value, $destination);
    }

    public function convert(float $value, Units $destination): float
    {
        return $destination->convertFromBase($this->convertToBase($value));
    }

    public function correctNotation(): string
    {
        return match ($this) {
            self::SQUARE_METER => 'm²',
            self::SQUARE_KILOMETER => 'km²',
            self::SQUARE_CENTIMETER => 'cm²',
            self::SQUARE_MILLIMETER => 'mm²',
            self::SQUARE_INCH => 'in²',
            self::SQUARE_FOOT => 'ft²',
            self::SQUARE_YARD => 'yd²',
            self::SQUARE_MILE => 'mi²',
            self::ACRE => 'ac',
            self::HECTARE => 'ha',
        };
    }

    public static function extendedValues(string $unitName): Units
    {
        return match ($unitName) {
            'squaremeters', 'square meters' => self::SQUARE_METER,
            'squarekilometers', 'square kilometers' => self::SQUARE_KILOMETER,
            'squarecentimeters', 'square centimeters' => self::SQUARE_CENTIMETER,
            'squaremillimeters', 'square millimeters' => self::SQUARE_MILLIMETER,
            'squareinches', 'square inches' => self::SQUARE_INCH,
            'squarefeet', 'square feet' => self::SQUARE_FOOT,
            'squareyards', 'square yards' => self::SQUARE_YARD,
            'squaremiles', 'square miles' => self::SQUARE_MILE,
            'acres' => self::ACRE,
            'hectares' => self::HECTARE,
            default => throw new InvalidArgumentException('Invalid unit name'),
        };
    }
}
