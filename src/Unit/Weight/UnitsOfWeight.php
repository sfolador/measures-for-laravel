<?php

namespace Sfolador\Measures\Unit\Weight;

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
            self::POUND => $value / 453.59237,
            self::STONE => $value / 6350.29318,
            self::SHORT_TON => $value * 907184.74,
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
            self::POUND => $value * 453.59237,
            self::STONE => $value * 6350.29318,
            self::SHORT_TON => $value / 907184.74,
            self::LONG_TON => $value / 1016046.9088,
        };
    }

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
}
