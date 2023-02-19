<?php

namespace Sfolador\Measures\Unit\Weight;

use Exception;
use Sfolador\Measures\Unit\Traits\ConversionFactor;
use Sfolador\Measures\Unit\Units;

enum UnitsOfWeight: string implements Units
{
    use ConversionFactor;
    case MILLIGRAM = 'mg';
    case GRAM = 'g';
    case KILOGRAM = 'kg';
    case TON = 't';
    case OUNCE = 'oz';
    case POUND = 'lb';
    case STONE = 'st';
    case SHORT_TON = 'ton';
    case LONG_TON = 'lton';

    public function conversionFactor(): float
    {
        return match ($this) {
            self::MILLIGRAM => 1 / 1000,
            self::GRAM => 1,
            self::KILOGRAM => 1000,
            self::TON => 1000000,
            self::OUNCE => 28.349523125,
            self::POUND => 453.59237,
            self::STONE => 6350.29318,
            self::SHORT_TON => 907184.9,
            self::LONG_TON => 1016046.9088,
        };
    }

    public function to(float $value, Units $destination): float
    {
        return $this->convert($value, $destination);
    }

    public function convert(float $value, Units $destination): float
    {
        $valueInGrams = $this->convertToBase($value);

        $value = $destination->convertFromBase($valueInGrams);

        return $value;
    }

    public function toStringNotation(): string
    {
        return match ($this) {
            self::MILLIGRAM => 'mg',
            self::GRAM => 'g',
            self::KILOGRAM => 'Kg',
            self::TON => 't',
            self::OUNCE => 'oz',
            self::POUND => 'lb',
            self::STONE => 'st',
            self::SHORT_TON => 'ton',
            self::LONG_TON => 'lton',
        };
    }

    public static function extendedValues(string $unitName): self
    {
        return match ($unitName) {
            'milligrams' => self::MILLIGRAM,
            'grams' => self::GRAM,
            'kilograms' => self::KILOGRAM,
            'tons' => self::TON,
            'ounces' => self::OUNCE,
            'pounds' => self::POUND,
            'stones' => self::STONE,
            'shorttons','short tons' => self::SHORT_TON,
            'longtons','long tons' => self::LONG_TON,
            default => throw new Exception('Invalid unit name'),
        };
    }
}
