<?php

namespace Sfolador\Measures\Unit\Traits;

trait ConversionFactor
{
    use ConvertsWithBase;

    public function conversionFactor(): float
    {
        return 1.0;
    }

    public function convertToBase(float $value): float
    {
        return $value * $this->conversionFactor();
    }

    public function convertFromBase(float $value): float
    {
        return $value / $this->conversionFactor();
    }
}
