<?php

namespace Sfolador\Measures\Unit\Weight;

use Exception;
use Sfolador\Measures\Unit\Units;

enum UnitsOfWeight: string implements Units
{
    case MILLIGRAM = 'mg';
    case GRAM = 'g';
    case KILOGRAM = 'kg';
    case TON = 't';
    case OUNCE = 'oz';
    case POUND = 'lb';
    case STONE = 'st';
    case SHORT_TON = 'ton';
    case LONG_TON = 'lton';

    public function convertToBase(float $value): float
    {
        return match ($this) {
            self::MILLIGRAM => $value / 1000,
            self::GRAM => $value,
            self::KILOGRAM => $value * 1000,
            self::TON => $value * 1000000,
            self::OUNCE => $value * 28.349523125,
            self::POUND => $value * 453.59237,
            self::STONE => $value * 6350.29318,
            self::SHORT_TON => $value * 907184.9,
            self::LONG_TON => $value * 1016046.9088,
        };
    }

    public function convertFromBase(float $value): float
    {
        return match ($this) {
            self::MILLIGRAM => $value * 1000,
            self::GRAM => $value,
            self::KILOGRAM => $value / 1000,
            self::TON => $value / 1000000,
            self::OUNCE => $value / 28.349523125,
            self::POUND => $value / 453.59237,
            self::STONE => $value / 6350.29318,
            self::SHORT_TON => $value / 907184.9 ,
            self::LONG_TON => $value / 1016046.9088,
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

    public function correctNotation(): string
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
            'shorttons' => self::SHORT_TON,
            'longtons' => self::LONG_TON,
            default => throw new Exception('Invalid unit name'),
        };
    }
}
