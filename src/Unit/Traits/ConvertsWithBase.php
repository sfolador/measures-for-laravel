<?php

namespace Sfolador\Measures\Unit\Traits;

trait ConvertsWithBase
{
    public function convertToBase(float $value): float
    {
        return 1.0;
    }

    public function convertFromBase(float $value): float
    {
        return 1.0;
    }
}
