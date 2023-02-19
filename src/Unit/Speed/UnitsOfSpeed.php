<?php

namespace Sfolador\Measures\Unit\Speed;

use Exception;
use Sfolador\Measures\Unit\Units;

enum UnitsOfSpeed: string implements Units
{
    case METER_PER_SECOND = 'm_s';
    case KILOMETER_PER_HOUR = 'km_h';
    case MILE_PER_HOUR = 'mi_h';
    case KNOT = 'kn';
    case FOOT_PER_SECOND = 'ft_s';
    case MACH = 'mach';

    public function convertFromBase(float $value): float
    {
        return match ($this) {
            self::METER_PER_SECOND => $value,
            self::KILOMETER_PER_HOUR => $value * 3.6,
            self::MILE_PER_HOUR => $value * 2.23693629,
            self::KNOT => $value * 1.94384449,
            self::FOOT_PER_SECOND => $value * 0.3048,
            self::MACH => $value * 340.29,
        };
    }

    public function convertToBase(float $value): float
    {
        return match ($this) {
            self::METER_PER_SECOND => $value,
            self::KILOMETER_PER_HOUR => $value / 3.6,
            self::MILE_PER_HOUR => $value / 2.23693629,
            self::KNOT => $value / 1.94384449,
            self::FOOT_PER_SECOND => $value / 0.3048,
            self::MACH => $value / 340.29,
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
            self::METER_PER_SECOND => 'm/s',
            self::KILOMETER_PER_HOUR => 'Km/h',
            self::MILE_PER_HOUR => 'mi/h',
            self::KNOT => 'kn',
            self::FOOT_PER_SECOND => 'ft/s',
            self::MACH => 'mach',
        };
    }

    public static function extendedValues(string $unitName): Units
    {
        return match ($unitName) {
            'meters_per_second', 'meters per second','meterspersecond', 'm/s' => self::METER_PER_SECOND,
            'kilometers_per_hour', 'kilometers per hour','km/h','kilometersperhour' => self::KILOMETER_PER_HOUR,
            'miles_per_hour', 'miles per hour','mi/h', 'milesperhour' => self::MILE_PER_HOUR,
            'knots' => self::KNOT,
            'feet_per_second', 'feet per second','feetpersecond','ft/s' => self::FOOT_PER_SECOND,
            'mach' => self::MACH,
            default => throw new Exception('Invalid unit name'),
        };
    }
}
