<?php

namespace Sfolador\Measures\Unit\Temperature;

use Exception;
use Sfolador\Measures\Unit\Units;

enum UnitsOfTemperature: string implements Units
{
    case CELSIUS = 'cdeg';
    case FAHRENHEIT = 'fdeg';

    case KELVIN = 'K';
    case KELVIN_DEG = 'kdeg';

    public function convertToBase(float $value): float
    {
        return match ($this) {
            self::CELSIUS => $value + 273.15,
            self::FAHRENHEIT => ($value + 459.67) * 5 / 9,
            self::KELVIN, self::KELVIN_DEG => $value,
        };
    }

    public function convertFromBase(float $value): float
    {
        return match ($this) {
            self::CELSIUS => $value - 273.15,
            self::FAHRENHEIT => $value * 9 / 5 - 459.67,
            self::KELVIN, self::KELVIN_DEG => $value,
        };
    }

    public function correctNotation(): string
    {
        return match ($this) {
            self::CELSIUS, => 'ºC',
            self::FAHRENHEIT, => 'ºF',
            self::KELVIN, self::KELVIN_DEG => 'ºK',
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

    public static function extendedValues(string $unitName): self
    {
        return match ($unitName) {
            'celsius' => self::CELSIUS,
            'fahrenheit' => self::FAHRENHEIT,
            'kelvin' => self::KELVIN,
            default => throw new Exception('Invalid unit name'),
        };
    }
}
