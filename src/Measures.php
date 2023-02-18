<?php

namespace Sfolador\Measures;

use Sfolador\Measures\Unit\Length\Length;
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
}
