<?php

use Sfolador\Measures\Unit\Pressure\Pressure;

it('can convert bar to pascal', function () {
    $bar = Pressure::from('1 bar');

    expect(round($bar->to('pa')->value, 1))->toBe(100000.0)
        ->and(round($bar->toPa()->value, 1))->toBe(100000.0)
        ->and(round($bar->toPascal()->value, 1))->toBe(100000.0)
        ->and((string) $bar->toPascal())->toBe('100000 Pa');
});

it('can convert bar to kilopascal', function () {
    $bar = Pressure::from('1 bar');

    expect(round($bar->to('kpa')->value, 1))->toBe(100.0)
        ->and(round($bar->toKpa()->value, 1))->toBe(100.0)
        ->and(round($bar->toKiloPascal()->value, 1))->toBe(100.0);
});

it('can convert bar to megapascal', function () {
    $bar = Pressure::from('1 bar');

    expect($bar->to('mpa')->value)->toBe(0.1)
        ->and($bar->toMpa()->value)->toBe(0.1)
        ->and($bar->toMegaPascal()->value)->toBe(0.1);
});

it('can convert bar to psi', function () {
    $bar = Pressure::from('1 bar');

    expect(round($bar->to('psi')->value, 3))->toBe(14.504)
        ->and(round($bar->toPsi()->value, 3))->toBe(14.504)
        ->and(round($bar->toPoundPerSquareInch()->value, 3))->toBe(14.504);
});

it('can convert bar to atmosphere', function () {
    $bar = Pressure::from('1 bar');

    expect(round($bar->to('atm')->value, 3))->toBe(0.987)
        ->and(round($bar->toAtm()->value, 3))->toBe(0.987)
        ->and(round($bar->toAtmosphere()->value, 3))->toBe(0.987);
});

it('can convert bar to torr', function () {
    $bar = Pressure::from('1 bar');

    expect(round($bar->to('torr')->value, 3))->toBe(750.062)
        ->and(round($bar->toTorr()->value, 3))->toBe(750.062)
        ->and(round($bar->toMillimeterOfMercury()->value, 3))->toBe(750.062);
});

it('can convert bar to inches of mercury', function () {
    $bar = Pressure::from('1 bar');

    expect(round($bar->to('inhg')->value, 2))->toBe(29.53)
        ->and(round($bar->toInhg()->value, 2))->toBe(29.53)
        ->and(round($bar->toInchesOfMercury()->value, 2))->toBe(29.53);
});




it('can convert millibar to pascal', function () {
    $mbar = Pressure::from('1 mbar');

    expect(round($mbar->to('pa')->value, 1))->toBe(100.0)
        ->and(round($mbar->toPa()->value, 1))->toBe(100.0)
        ->and(round($mbar->toPascal()->value, 1))->toBe(100.0)
        ->and((string) $mbar->toPascal())->toBe('100 Pa');
});

it('can convert millibar to kilopascal', function () {
    $mbar = Pressure::from('1 mbar');

    expect(round($mbar->to('kpa')->value, 1))->toBe(0.1)
        ->and(round($mbar->toKpa()->value, 1))->toBe(0.1)
        ->and(round($mbar->toKiloPascal()->value, 1))->toBe(0.1);
});

it('can convert millibar to megapascal', function () {
    $mbar = Pressure::from('1 mbar');

    expect($mbar->to('mpa')->value)->toBe(0.0001)
        ->and($mbar->toMpa()->value)->toBe(0.0001)
        ->and($mbar->toMegaPascal()->value)->toBe(0.0001);
});

it('can convert millibar to psi', function () {
    $mbar = Pressure::from('1 mbar');

    expect(round($mbar->to('psi')->value, 3))->toBe(0.015)
        ->and(round($mbar->toPsi()->value, 3))->toBe(0.015)
        ->and(round($mbar->toPoundPerSquareInch()->value, 3))->toBe(0.015);
});

it('can convert millibar to atmosphere', function () {
    $mbar = Pressure::from('1 mbar');

    expect(round($mbar->to('atm')->value, 3))->toBe(0.001)
        ->and(round($mbar->toAtm()->value, 3))->toBe(0.001)
        ->and(round($mbar->toAtmosphere()->value, 3))->toBe(0.001);
});

it('can convert millibar to torr', function () {
    $mbar = Pressure::from('1 mbar');

    expect(round($mbar->to('torr')->value, 3))->toBe(0.75)
        ->and(round($mbar->toTorr()->value, 3))->toBe(0.75)
        ->and(round($mbar->toMillimeterOfMercury()->value, 3))->toBe(0.75);
});

it('can convert millibar to inches of mercury', function () {
    $mbar = Pressure::from('1 mbar');

    expect(round($mbar->to('inhg')->value, 2))->toBe(0.03)
        ->and(round($mbar->toInhg()->value, 2))->toBe(0.03)
        ->and(round($mbar->toInchesOfMercury()->value, 2))->toBe(0.03);
});
