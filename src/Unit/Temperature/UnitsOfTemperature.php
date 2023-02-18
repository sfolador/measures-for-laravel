<?php

namespace Sfolador\Measures\Unit\Temperature;

use Sfolador\Measures\Unit\Units;

enum UnitsOfTemperature: string implements Units
{
    case CELSIUS = 'cdeg';
    case FAHRENHEIT = 'fdeg';

    case CELSIUS_OTHER = 'celsius';
    case FAHRENHEIT_OTHER = 'fahrenheit';

    case KELVIN = 'K';
    case KELVIN_DEG = 'kdeg';
    case KELVIN_OTHER = 'kelvin';

    public function convertToBase(float $value): float
    {
        return match ($this) {
            self::CELSIUS_OTHER, self::CELSIUS => $value + 273.15,
            self::FAHRENHEIT_OTHER, self::FAHRENHEIT => ($value + 459.67) * 5 / 9,
            self::KELVIN, self::KELVIN_OTHER, self::KELVIN_DEG => $value,
        };
    }

    public function convertFromBase(float $value): float
    {
        return match ($this) {
            self::CELSIUS_OTHER, self::CELSIUS => $value - 273.15,
            self::FAHRENHEIT_OTHER, self::FAHRENHEIT => $value * 9 / 5 - 459.67,
            self::KELVIN, self::KELVIN_OTHER,self::KELVIN_DEG => $value,
        };
    }

    public function correctNotation(): string
    {
        return match ($this) {
            self::CELSIUS, self::CELSIUS_OTHER => 'ºC',
            self::FAHRENHEIT, self::FAHRENHEIT_OTHER => 'ºF',
            self::KELVIN, self::KELVIN_OTHER,self::KELVIN_DEG => 'ºK',
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
}
