<?php

namespace Sfolador\Measures\Unit\Time;

use Exception;
use Sfolador\Measures\Unit\Traits\ConversionFactor;
use Sfolador\Measures\Unit\Units;

enum UnitsOfTime: string implements Units
{
    use ConversionFactor;

    case NANOSECOND = 'ns';
    case MICROSECOND = 'us';
    case MILLISECOND = 'ms';
    case SECOND = 's';
    case MINUTE = 'min';
    case HOUR = 'h';
    case DAY = 'd';
    case WEEK = 'w';
    case MONTH = 'mo';
    case YEAR = 'y';

    public function conversionFactor(): float
    {
        return match ($this) {
            self::NANOSECOND => 1 / 1000000000,
            self::MICROSECOND => 1 / 1000000,
            self::MILLISECOND => 1 / 1000,
            self::SECOND => 1,
            self::MINUTE => 60,
            self::HOUR => 3600,
            self::DAY => 86400,
            self::WEEK => 604800,
            self::MONTH => 2629746,
            self::YEAR => 31556952,
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

    public function toStringNotation(): string
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
            self::MONTH => 'mo',
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
