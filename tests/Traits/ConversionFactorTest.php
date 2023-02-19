<?php

use Sfolador\Measures\Unit\Traits\ConversionFactor;

it('has a float conversion factor', function () {

    $a = new class {
        use ConversionFactor;
    };

    expect($a->conversionFactor())
        ->toBeFloat();
});
