<?php

use Sfolador\Measures\Unit\Area\Area;
use Sfolador\Measures\Unit\Area\UnitsOfArea;

it('can convert from square meters to square kilometers', function () {
    $area = Area::from('1m2');
    $area = $area->to('km2');

    expect($area->realValue())->toBe(0.000001);
});

it('can convert from square meters to square centimeters', function () {
    $area = Area::from('1 m2');
    $area = $area->to('cm2');

    expect($area->value)->toBe(10000.0);
});

it('can convert from square meters to square millimeters', function () {
    $area = Area::from('1 m2');
    $area = $area->to('mm2');

    expect($area->value)->toBe(1000000.0);
});

it('can convert from square meters to square inches', function () {
    $area = Area::from('1 m2');
    $rounded = round($area->to('in2')->value, 4);
    expect($rounded)->toBe(1550.0031);
});

it('can convert from square meters to square feet', function () {
    $area = Area::from('1 m2');
    $rounded = round($area->to('ft2')->value, 4);
    expect($rounded)->toBe(10.7639);
});

it('can convert from square meters to square yards', function () {
    $area = Area::from('1 m2');
    $rounded = round($area->to('yd2')->value, 4);
    expect($rounded)->toBe(1.196);
});

it('can convert from square kilometers to square miles', function () {
    $area = Area::from('1 km2');
    $rounded = round($area->to('mi2')->value, 4);
    expect($rounded)->toBe(0.3861);
});

it('can convert from square kilometers to acres', function () {
    $area = Area::from('1 km2');
    $rounded = round($area->to('ac')->value, 4);
    expect($rounded)->toBe(247.1054);
});

it('can convert from square kilometers to hectares', function () {
    $area = Area::from('1 km2');
    $rounded = round($area->to('ha')->value, 4);
    expect($rounded)->toBe(100.0);
});

it('can convert from square inches to square feet', function () {
    $area = Area::from('1in2');
    $rounded = round($area->to('ft2')->value, 4);
    expect($rounded)->toBe(0.0069);
});

it('can convert from square inches to square yards', function () {
    $area = Area::from('1in2');
    $rounded = round($area->to('yd2')->value, 4);
    expect($rounded)->toBe(0.0008);
});

it('can convert from square inches to square miles', function () {
    $area = Area::from('10000in2');
    $rounded = round($area->to('mi2')->realValue(), 8);
    expect($rounded)->toBe(0.00000249);
});

it('can convert acres to square miles', function () {
    $area = Area::from('1ac');
    expect($area->to('mi2')->value)->toBe(0.0016);
});

it('can convert acres to hectares', function () {
    $area = Area::from('1ac');
    $rounded = round($area->to('ha')->value, 4);
    expect($rounded)->toBe(0.4047);
});

it('can use extended units to convert square meters to square inches', function () {
    $area = Area::from('1 square meters');
    $rounded = round($area->to('square inches')->value, 4);
    expect($rounded)->toBe(1550.0031);
});

it('can use extended units to convert square meters to square feet', function () {
    $area = Area::from('1 square meters');
    $rounded = round($area->to('square feet')->value, 4);
    expect($rounded)->toBe(10.7639);
});

it('can use extended units to convert square meters to square yards', function () {
    $area = Area::from('1 square meters');
    $rounded = round($area->to('square yards')->value, 4);
    expect($rounded)->toBe(1.196);
});

it('can correct units to a correct notation', function () {
    $cases = UnitsOfArea::cases();
    foreach ($cases as $case) {
        $value = $case->value;
        $valueWithExponent = Str::of($value)->replace('2', '²')->value();
        expect($case->toStringNotation())->toBe($valueWithExponent);
    }
});
