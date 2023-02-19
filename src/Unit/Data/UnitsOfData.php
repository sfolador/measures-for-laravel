<?php

namespace Sfolador\Measures\Unit\Data;

use InvalidArgumentException;
use Sfolador\Measures\Unit\Traits\ConversionFactor;
use Sfolador\Measures\Unit\Units;

enum UnitsOfData: string implements Units
{
    use ConversionFactor;

    case BIT = 'bit';
    case BYTE = 'byte';
    case KILOBIT = 'kbit';
    case KILOBYTE = 'kb';
    case MEGABIT = 'mbit';
    case MEGABYTE = 'mb';
    case GIGABIT = 'gbit';
    case GIGABYTE = 'gb';
    case TERABIT = 'tbit';
    case TERABYTE = 'tb';
    case PETABIT = 'pbit';
    case PETABYTE = 'pb';

    case KIBIBIT = 'kibit';
    case KIBIBYTE = 'kib';
    case MEBIBIT = 'mibit';
    case MEBIBYTE = 'mib';
    case GIBIBIT = 'gibit';
    case GIBIBYTE = 'gib';
    case TEBIBIT = 'tibit';
    case TEBIBYTE = 'tib';
    case PEBIBIT = 'pibit';
    case PEBIBYTE = 'pib';

    public function conversionFactor(): float
    {
        return match ($this) {
            self::BIT => 1,
            self::BYTE => 8,
            self::KILOBIT => 1000,
            self::KILOBYTE => 8000,
            self::MEGABIT => 1000000,
            self::MEGABYTE => 8000000,
            self::GIGABIT => 1000000000,
            self::GIGABYTE => 8000000000,
            self::TERABIT => 1000000000000,
            self::TERABYTE => 8000000000000,
            self::PETABIT => 1000000000000000,
            self::PETABYTE => 8000000000000000,
            self::KIBIBIT => 1024,
            self::KIBIBYTE => 8192,
            self::MEBIBIT => 1048576,
            self::MEBIBYTE => 8388608,
            self::GIBIBIT => 1073741824,
            self::GIBIBYTE => 8589934592,
            self::TEBIBIT => 1099511627776,
            self::TEBIBYTE => 8796093022208,
            self::PEBIBIT => 1125899906842624,
            self::PEBIBYTE => 9007199254740992,
        };
    }

    public function toStringNotation(): string
    {
        return match ($this) {
            self::BIT => 'bit',
            self::BYTE => 'B',
            self::KILOBIT => 'kbit',
            self::KILOBYTE => 'kB',
            self::MEGABIT => 'Mbit',
            self::MEGABYTE => 'MB',
            self::GIGABIT => 'Gbit',
            self::GIGABYTE => 'GB',
            self::TERABIT => 'Tbit',
            self::TERABYTE => 'TB',
            self::PETABIT => 'Pbit',
            self::PETABYTE => 'PB',
            self::KIBIBIT => 'Kibit',
            self::KIBIBYTE => 'KiB',
            self::MEBIBIT => 'Mibit',
            self::MEBIBYTE => 'MiB',
            self::GIBIBIT => 'Gibit',
            self::GIBIBYTE => 'GiB',
            self::TEBIBIT => 'Tibit',
            self::TEBIBYTE => 'TiB',
            self::PEBIBIT => 'Pibit',
            self::PEBIBYTE => 'PiB',
        };
    }

    public static function extendedValues(string $unitName): Units
    {
        return match ($unitName) {
            'bit', 'bits' => self::BIT,
            'byte', 'bytes','b' => self::BYTE,
            'kilobit', 'kilobits' => self::KILOBIT,
            'kilobyte', 'kilobytes' => self::KILOBYTE,
            'megabit', 'megabits' => self::MEGABIT,
            'megabyte', 'megabytes' => self::MEGABYTE,
            'gigabit', 'gigabits' => self::GIGABIT,
            'gigabyte', 'gigabytes' => self::GIGABYTE,
            'terabit', 'terabits' => self::TERABIT,
            'terabyte', 'terabytes' => self::TERABYTE,
            'petabit', 'petabits' => self::PETABIT,
            'petabyte', 'petabytes' => self::PETABYTE,
            'kibibit', 'kibibits' => self::KIBIBIT,
            'kibibyte', 'kibibytes' => self::KIBIBYTE,
            'mebibit', 'mebibits' => self::MEBIBIT,
            'mebibyte', 'mebibytes' => self::MEBIBYTE,
            'gibibit', 'gibibits' => self::GIBIBIT,
            'gibibyte', 'gibibytes' => self::GIBIBYTE,
            'tebibit', 'tebibits' => self::TEBIBIT,
            'tebibyte', 'tebibytes' => self::TEBIBYTE,
            'pebibit', 'pebibits' => self::PEBIBIT,
            'pebibyte', 'pebibytes' => self::PEBIBYTE,
            default => throw new InvalidArgumentException('Invalid unit name'),
        };
    }
}
