<?php

use Sfolador\Measures\Unit\Weight\UnitsOfWeight;
use Sfolador\Measures\Unit\Weight\Weight;

it('can convert a g to kg', function () {
    $weight = Weight::from('2g');

    expect($weight->toKg())
        ->and($weight->toKg()->value)
        ->toBe(0.002)
        ->and((string) $weight->toKg())->toBe('0.002 Kg');
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

    expect($weight->toOz()->value)
        ->toBe(0.0705);
});

it('can correct units to a correct notation', function () {
    $cases = UnitsOfWeight::cases();
    foreach ($cases as $case) {
        if ($case === UnitsOfWeight::KILOGRAM) {
            expect($case->toStringNotation())->toBe('Kg');
        } else {
            expect($case->toStringNotation())->toBe($case->value);
        }
    }
});

it('can convert from g to kg', function () {
    $weight = Weight::from('2g');
    expect($weight->toKg()->value)->toBe(0.002);
});

it('can convert from kg to g', function () {
    $weight = Weight::from('2kg');
    expect($weight->toG()->value)->toBe(2000.0);
});

it('can convert from g to ounces', function () {
    $weight = Weight::from('2 g');

    expect($weight->toOz()->value)->toBe(0.0705);
});

it('can convert from ounces to g', function () {
    $weight = Weight::from('2 oz');

    expect($weight->toG()->value)->toBe(56.699);
});

it('can convert from ounces to kg', function () {
    $weight = Weight::from('2 oz');

    expect($weight->toKg()->value)->toBe(0.0567);
});

it('can convert from kg to ounces', function () {
    $weight = Weight::from('2 kg');

    expect($weight->toOz()->value)->toBe(70.5479);
});

it('can convert from kg to stones', function () {
    $weight = Weight::from('2 kg');

    expect($weight->toSt()->value)->toBe(0.3149);
});

it('can convert from kg to lbs', function () {
    $weight = Weight::from('2 kg');

    expect($weight->toLb()->value)->toBe(4.4092);
});

it('can convert from kg to tons', function () {
    $weight = Weight::from('2 kg');
    expect($weight->toT()->value)->toBe(0.002);
});

it('can convert from tons to kg', function () {
    $weight = Weight::from('2 t');
    expect($weight->toKg()->value)->toBe(2000.0);
});

it('can convert from tons to g', function () {
    $weight = Weight::from('2 t');
    expect($weight->toG()->value)->toBe(2000000.0);
});

it('can convert from tons to ounces', function () {
    $weight = Weight::from('2 t');

    expect($weight->toOz()->value)->toBe(70547.9239);
});

it('can convert from tons to lbs', function () {
    $weight = Weight::from('2 t');

    expect($weight->toLb()->value)->toBe(4409.2452);
});

it('can use extended names to convert units', function () {
    $weight = Weight::from('2 grams');

    expect($weight->toKilograms()->value)->toBe(0.002)
        ->and($weight->toOunces()->value)->toBe(0.0705)
        ->and($weight->toPounds()->value)->toBe(0.0044);

    $round = round($weight->toPounds()->value, 10);
    expect($round)->toBe(0.0044);

    $round = round($weight->toStones()->realValue(), 10);
    expect($round)->toBe(0.0003142857);

    $weight = Weight::from('2000 Kilograms');
    expect($weight->toShortTons()->value)->toBe(2.2046);
});
