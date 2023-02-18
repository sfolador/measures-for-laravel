<?php

use Sfolador\Measures\Unit\Weight\UnitsOfWeight;
use Sfolador\Measures\Unit\Weight\Weight;

it('can convert a g to kg', function () {
    $weight = Weight::from('2g');

    expect($weight->toKg())
        ->and($weight->toKg()->value)
        ->toBe(0.002)
        ->and((string)$weight->toKg())->toBe('0.002 Kg');
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

it('can correct units to a correct notation', function () {
    $cases = UnitsOfWeight::cases();
    foreach ($cases as $case) {
        if ($case === UnitsOfWeight::KILOGRAM) {
            expect($case->correctNotation())->toBe('Kg');
        } else {
            expect($case->correctNotation())->toBe($case->value);
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

    $round = round($weight->toOz()->value, 7);

    expect($round)->toBe(0.0705479);
});

it('can convert from ounces to g', function () {
    $weight = Weight::from('2 oz');

    $round = round($weight->toG()->value, 3);
    expect($round)->toBe(56.699);
});

it('can convert from ounces to kg', function () {
    $weight = Weight::from('2 oz');

    $round = round($weight->toKg()->value, 7);

    expect($round)->toBe(0.056699);
});

it('can convert from kg to ounces', function () {
    $weight = Weight::from('2 kg');
    $round = round($weight->toOz()->value, 4);

    expect($round)->toBe(70.5479);
});

//it('can convert from kg to stones', function () {
//    $weight = Weight::from('2 kg');
//    $round = round($weight->toSt()->value, 4);
//
//    expect($round)->toBe(0.3175);
//});

it('can convert from kg to lbs', function () {
    $weight = Weight::from('2 kg');

    $round = round($weight->toLb()->value, 4);

    expect($round)->toBe(4.4092);
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

    $round = round($weight->toOz()->value, 4);

    expect($round)->toBe(70547.9239);
});

it('can convert from tons to lbs', function () {
    $weight = Weight::from('2 t');

    $round = round($weight->toLb()->value, 8);
    expect($round)->toBe(4409.2452437);
});


it('can use extended names to convert units', function () {
    $weight = Weight::from('2 grams');

    expect($weight->toKilograms()->value)->toBe(0.002);

    $round = round($weight->toOunces()->value, 8);
    expect($round)->toBe(0.07054792);

    $round = round($weight->toPounds()->value, 10);
    expect($round)->toBe(0.0044092452);

    $round = round($weight->toTons()->value, 10);
    expect($round)->toBe(0.000002);

    $round = round($weight->toGrams()->value, 3);
    expect($round)->toBe(2.0);


    $round = round($weight->toStones()->value, 10);
    expect($round)->toBe(0.0003149461);


    $weight = Weight::from('2000 Kilograms');
    $round = round($weight->toShortTons()->value, 10);
    expect($round)->toBe(2.204622233);
});
