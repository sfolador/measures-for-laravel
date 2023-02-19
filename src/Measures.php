<?php

namespace Sfolador\Measures;

use Sfolador\Measures\Unit\Area\Area;
use Sfolador\Measures\Unit\Length\Length;
use Sfolador\Measures\Unit\Temperature\Temperature;
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
}
