<?php


use Sfolador\Measures\Unit\Traits\ConvertsWithBase;

it('can convert to base', function () {

    $a = new class {
        use ConvertsWithBase;
    };

    expect($a->convertToBase(1.0))
        ->toBeFloat();
});


it('can convert from base', function () {

    $a = new class {
        use ConvertsWithBase;
    };

    expect($a->convertFromBase(1.0))
        ->toBeFloat();
});
