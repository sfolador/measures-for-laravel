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

it('can convert from mm to m', function () {
    $length = Length::from('2mm');
    expect($length->toM()->value)->toBe(0.002);
});

it('can convert from m to cm', function () {
    $length = Length::from('2m');
    expect($length->toCM()->value)->toBe(200.0);
});

it('can convert from m to km', function () {
    $length = Length::from('2m');
    expect($length->toKM()->value)->toBe(0.002);
});

it('can convert from m to miles', function () {
    $length = Length::from('2m');

    $rounded = round($length->toMi()->value, 9);

    expect($rounded)->toBe(0.001242742);
});

it('can convert from m to nautical miles', function () {
    $length = Length::from('2m');
    $rounded = round($length->toNmi()->value, 9);
    expect($rounded)->toBe(0.001079914);
});

it('can convert from miles to m', function () {
    $length = Length::from('2mi');
    expect($length->toMM()->value)->toBe(3218688.0);
});

it('can convert from miles to cm', function () {
    $length = Length::from('2mi');
    expect($length->toCM()->value)->toBe(321868.8);
});

it('can convert from miles to km', function () {
    $length = Length::from('2mi');
    expect($length->toKM()->value)->toBe(3.218688);
});

it('can convert from miles to nautical miles', function () {
    $length = Length::from('2mi');

    $rounded = round($length->toNmi()->value, 9);

    expect($rounded)->toBe(1.737952484);
});
