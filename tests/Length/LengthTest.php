<?php

use Sfolador\Measures\Unit\Length\Length;
use Sfolador\Measures\Unit\UnitsOfLength;

it('can convert a length', function () {
    $length = Length::from('2cm');

    expect($length->to(UnitsOfLength::METER))
        ->toBeInstanceOf(Length::class)
        ->and($length->to(UnitsOfLength::METER)->value)
        ->toBe(0.02);
});

it('can convert a length from short forms', function () {
    $length = Length::from('2cm');

    expect($length->toM())
        ->and($length->toM()->value)
        ->toBe(0.02);

    expect($length->toM()->toCM())
            ->and($length->toM()->toCM()->value)
            ->toBe(2.0);

    $length = Length::from('2.5km');

    expect($length->toKM())
        ->and($length->toKM()->value)
        ->toBe(2.5);
});



it('can convert a length from different values', function () {
    $length = Length::from('2  cm');

    expect($length->toM())
        ->and($length->toM()->value)
        ->toBe(0.02);


});
