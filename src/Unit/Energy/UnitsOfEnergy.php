<?php

namespace Sfolador\Measures\Unit\Energy;

use InvalidArgumentException;
use Sfolador\Measures\Unit\Traits\ConversionFactor;
use Sfolador\Measures\Unit\Units;

enum UnitsOfEnergy: string implements Units
{
    use ConversionFactor;

    case JOULE = 'j';
    case KILOJOULE = 'kj';
    case MEGAJOULE = 'mj';
    case GIGAJOULE = 'gj';

    case WATTHOUR = 'wh';
    case KILOWATTHOUR = 'kwh';
    case MEGAWATTHOUR = 'mwh';
    case GIGAWATTHOUR = 'gwh';

    case CALORIE = 'cal';
    case KILOCALORIE = 'kcal';
    case MEGACALORIE = 'mcal';
    case GIGACALORIE = 'gcal';

    case ELECTRONVOLT = 'ev';
    case KILOELECTRONVOLT = 'kev';
    case MEGAELECTRONVOLT = 'mev';
    case GIGAELECTRONVOLT = 'gev';

    public function conversionFactor(): float
    {
        return match ($this) {
            self::JOULE => 1.0,
            self::KILOJOULE => 1000.0,
            self::MEGAJOULE => 1000000.0,
            self::GIGAJOULE => 1000000000.0,
            self::WATTHOUR => 3600.0,
            self::KILOWATTHOUR => 3600000.0,
            self::MEGAWATTHOUR => 3600000000.0,
            self::GIGAWATTHOUR => 3600000000000.0,
            self::CALORIE => 4184,
            self::KILOCALORIE => 4184.0,
            self::MEGACALORIE => 4184000.0,
            self::GIGACALORIE => 4184000000.0,
            self::ELECTRONVOLT => 1.602176634e-19,
            self::KILOELECTRONVOLT => 1.602176634e-16,
            self::MEGAELECTRONVOLT => 1.602176634e-13,
            self::GIGAELECTRONVOLT => 1.602176634e-10,
        };
    }

    public function toStringNotation(): string
    {
        return match ($this) {
            self::JOULE => 'J',
            self::KILOJOULE => 'KJ',
            self::MEGAJOULE => 'MJ',
            self::GIGAJOULE => 'GJ',
            self::WATTHOUR => 'Wh',
            self::KILOWATTHOUR => 'KWh',
            self::MEGAWATTHOUR => 'MWh',
            self::GIGAWATTHOUR => 'GWh',
            self::CALORIE => 'cal',
            self::KILOCALORIE => 'Kcal',
            self::MEGACALORIE => 'Mcal',
            self::GIGACALORIE => 'Gcal',
            self::ELECTRONVOLT => 'eV',
            self::KILOELECTRONVOLT => 'KeV',
            self::MEGAELECTRONVOLT => 'MeV',
            self::GIGAELECTRONVOLT => 'GeV',
        };
    }

    public static function extendedValues(string $unitName): Units
    {
        return match ($unitName) {
            'joules','joule' => self::JOULE,
            'kilojoules','kilo joules','kilojoule' => self::KILOJOULE,
            'megajoules','mega joules','megajoule' => self::MEGAJOULE,
            'gigajoules','giga joules','gigajoule' => self::GIGAJOULE,
            'watthours','watthour' => self::WATTHOUR,
            'kilowatthours','kilo watthours','kilowatthour' => self::KILOWATTHOUR,
            'megawatthours','mega watthours','megawatthour' => self::MEGAWATTHOUR,
            'gigawatthours','giga watthours','gigawatthour' => self::GIGAWATTHOUR,
            'calories','calorie' => self::CALORIE,
            'kilocalories','kilo calories','kilocalorie' => self::KILOCALORIE,
            'megacalories','mega calories','megacalorie' => self::MEGACALORIE,
            'gigacalories','giga calories','gigacalorie' => self::GIGACALORIE,
            'electronvolts','electronvolt' => self::ELECTRONVOLT,
            'kiloelectronvolts','kilo electronvolts','kiloelectronvolt' => self::KILOELECTRONVOLT,
            'megaelectronvolts','mega electronvolts','megaelectronvolt' => self::MEGAELECTRONVOLT,
            'gigaelectronvolts','giga electronvolts','gigaelectronvolt' => self::GIGAELECTRONVOLT,
            default => throw new InvalidArgumentException('Invalid unit name'),
        };
    }
}
