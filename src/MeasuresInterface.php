<?php

namespace Sfolador\Measures;

use Sfolador\Measures\Unit\Area\Area;
use Sfolador\Measures\Unit\Length\Length;
use Sfolador\Measures\Unit\Measure;
use Sfolador\Measures\Unit\Speed\Speed;
use Sfolador\Measures\Unit\Temperature\Temperature;
use Sfolador\Measures\Unit\Time\Time;
use Sfolador\Measures\Unit\Volume\Volume;
use Sfolador\Measures\Unit\Weight\Weight;

interface MeasuresInterface
{
    public function length(string $expression): Length;

    public function weight(string $expression): Weight;

    public function volume(string $expression): Volume;

    public function temperature(string $expression): Temperature;

    public function area(string $expression): Area;

    public function speed(string $expression): Speed;

    public function time(string $expression): Time;

    public function from(string $expression): ?Measure;
}
