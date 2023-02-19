<?php

namespace Sfolador\Measures\Unit\Traits;

use Sfolador\Measures\Unit\Units;

trait ConvertsWithBase
{
    public function to(float $value, Units $destination): float
    {
        return $this->convert($value, $destination);
    }

    public function convert(float $value, Units $destination): float
    {
        return $destination->convertFromBase($this->convertToBase($value));
    }

    public function convertToBase(float $value): float
    {
        return 1.0;
    }

    public function convertFromBase(float $value): float
    {
        return 1.0;
    }
}
