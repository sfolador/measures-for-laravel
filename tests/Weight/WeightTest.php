<?php

use Sfolador\Measures\Unit\Weight\Weight;

it('can convert a g to kg', function () {
    $weight = Weight::from('2g');

    expect($weight->toKg())
        ->and($weight->toKg()->value)
        ->toBe(0.002);

    expect((string)$weight->toKg())->toBe('0.002Kg');
});

it('can convert to tons', function () {
    $weight = Weight::from('2000 Kg');

    expect($weight->toT())
        ->and($weight->toT()->value)
        ->toBe(2.0);
});

it('can convert kg to g', function () {
    $weight = Weight::from('2kg');

    expect($weight->toG())
        ->and($weight->toG()->value)
        ->toBe(2000.0);
});

it('can convert g to ounces', function () {
    $weight = Weight::from('2 g');


    $round = round($weight->toOz()->value, 10);

    expect($weight->toOz())
        ->and($round)
        ->toBe(0.0705479239);
});

