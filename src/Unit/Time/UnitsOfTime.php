<?php

namespace Sfolador\Measures\Unit\Time;

use Exception;
use Sfolador\Measures\Unit\Units;

enum UnitsOfTime: string implements Units
{
    case NANOSECOND = 'ns';
    case MICROSECOND = 'us';
    case MILLISECOND = 'ms';
    case SECOND = 's';
    case MINUTE = 'min';
    case HOUR = 'h';
    case DAY = 'd';
    case WEEK = 'w';
    case MONTH = 'm';
    case YEAR = 'y';

    public function convertFromBase(float $value): float
    {
        return match ($this) {
            self::NANOSECOND => $value * 1000000000,
            self::MICROSECOND => $value * 1000000,
            self::MILLISECOND => $value * 1000,
            self::SECOND => $value,
            self::MINUTE => $value / 60,
            self::HOUR => $value / 3600,
            self::DAY => $value / 86400,
            self::WEEK => $value / 604800,
            self::MONTH => $value / 2629746,
            self::YEAR => $value / 31556952,
        };
    }

    public function convertToBase(float $value): float
    {
        return match ($this) {
            self::NANOSECOND => $value / 1000000000,
            self::MICROSECOND => $value / 1000000,
            self::MILLISECOND => $value / 1000,
            self::SECOND => $value,
            self::MINUTE => $value * 60,
            self::HOUR => $value * 3600,
            self::DAY => $value * 86400,
            self::WEEK => $value * 604800,
            self::MONTH => $value * 2629746,
            self::YEAR => $value * 31556952,
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
            self::NANOSECOND => 'ns',
            self::MICROSECOND => 'us',
            self::MILLISECOND => 'ms',
            self::SECOND => 's',
            self::MINUTE => 'min',
            self::HOUR => 'h',
            self::DAY => 'd',
            self::WEEK => 'w',
            self::MONTH => 'm',
            self::YEAR => 'y',
        };
    }

    public static function extendedValues(string $unitName): Units
    {
        return match ($unitName) {
            'nanosecond', 'nanoseconds' => self::NANOSECOND,
            'microsecond', 'microseconds' => self::MICROSECOND,
            'millisecond', 'milliseconds' => self::MILLISECOND,
            'second', 'seconds' => self::SECOND,
            'minute', 'minutes' => self::MINUTE,
            'hour', 'hours' => self::HOUR,
            'day', 'days' => self::DAY,
            'week', 'weeks' => self::WEEK,
            'month', 'months' => self::MONTH,
            'year', 'years' => self::YEAR,
            default => throw new Exception('Invalid unit name'),
        };
    }
}
