<?php

declare(strict_types=1);

namespace Sfolador\Measures;

use Exception;
use Sfolador\Measures\Unit\Angle\Angle;
use Sfolador\Measures\Unit\Area\Area;
use Sfolador\Measures\Unit\Data\Data;
use Sfolador\Measures\Unit\Energy\Energy;
use Sfolador\Measures\Unit\Length\Length;
use Sfolador\Measures\Unit\Measure;
use Sfolador\Measures\Unit\Power\Power;
use Sfolador\Measures\Unit\Pressure\Pressure;
use Sfolador\Measures\Unit\Speed\Speed;
use Sfolador\Measures\Unit\Temperature\Temperature;
use Sfolador\Measures\Unit\Time\Time;
use Sfolador\Measures\Unit\Volume\Volume;
use Sfolador\Measures\Unit\Weight\Weight;

class Measures implements MeasuresInterface
{
    public function length(string $expression): Length
    {
        return Length::from($expression);
    }

    public function weight(string $expression): Weight
    {
        return Weight::from($expression);
    }

    public function volume(string $expression): Volume
    {
        return Volume::from($expression);
    }

    public function temperature(string $expression): Temperature
    {
        return Temperature::from($expression);
    }

    public function area(string $expression): Area
    {
        return Area::from($expression);
    }

    public function speed(string $expression): Speed
    {
        return Speed::from($expression);
    }

    public function time(string $expression): Time
    {
        return Time::from($expression);
    }

    public function pressure(string $expression): Pressure
    {
        return Pressure::from($expression);
    }

    public function energy(string $expression): Energy
    {
        return Energy::from($expression);
    }

    public function power(string $expression): Power
    {
        return Power::from($expression);
    }

    public function angle(string $expression): Angle
    {
        return Angle::from($expression);
    }

    public function data(string $expression): Data
    {
        return Data::from($expression);
    }

    public function from(string $expression): ?Measure
    {
        $measures = [
            Length::class,
            Weight::class,
            Volume::class,
            Temperature::class,
            Area::class,
            Speed::class,
            Time::class,
            Pressure::class,
            Energy::class,
            Power::class,
            Angle::class,
            Data::class,
        ];

        $results = null;
        foreach ($measures as $measure) {
            try {
                /**
                 * @var Measure $results
                 * @var Measure $measure
                 */
                $results = $measure::from($expression);
                //add a break here to stop after the first match
            } catch (Exception) {
                continue;
            }
        }

        return $results;
    }
}
