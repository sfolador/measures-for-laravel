<?php

use Sfolador\Measures\Unit\Length\Length;
use Sfolador\Measures\Unit\Length\UnitsOfLength;

it('can convert a length', function () {
    $length = Length::from('2cm');

    expect($length->to(UnitsOfLength::METER))
        ->toBeInstanceOf(Length::class)
        ->and($length->to(UnitsOfLength::METER)->value)
        ->toBe(0.02);
});

it('can concatenate conversions', function () {
    $length = Length::from('2cm');

    expect($length->toM()->toCM())
        ->and($length->toM()->toCM()->value)
        ->toBe(2.0);
});

it('can accept a string with many spaces', function () {
    $length = Length::from('2  cm');

    expect($length->toM())
        ->and($length->toM()->value)
        ->toBe(0.02);
});

it('can have a null unit', function () {
    $length = Length::from('2 .');
    expect($length->unit)->toBeNull();

    $length = Length::from('2 ');
    expect($length->unit)->toBeNull();
});

it('can correct units to a correct notation', function () {
    $cases = UnitsOfLength::cases();
    foreach ($cases as $case) {
        if ($case === UnitsOfLength::KILOMETER) {
            expect($case->correctNotation())->toBe('Km');
        } else {
            expect($case->correctNotation())->toBe($case->value);
        }
    }
});
