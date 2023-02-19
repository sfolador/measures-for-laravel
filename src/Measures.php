<?php

namespace Sfolador\Measures;

use Exception;
use Sfolador\Measures\Unit\Area\Area;
use Sfolador\Measures\Unit\Length\Length;
use Sfolador\Measures\Unit\Measure;
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
        ];

        $results = null;
        foreach ($measures as $measure) {
            try {
                $results = $measure::from($expression);
            }catch (Exception $e) {
                continue;
            }
        }

        return $results;
    }
}
