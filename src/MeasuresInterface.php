<?php

namespace Sfolador\Measures;

use Sfolador\Measures\Unit\Length\Length;
use Sfolador\Measures\Unit\Weight\Weight;

interface MeasuresInterface
{
    public function length(string $expression): Length;

    public function weight(string $expression): Weight;
}
