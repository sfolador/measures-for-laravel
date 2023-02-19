<?php

use Sfolador\Measures\Unit\Pressure\Pressure;

it('can convert bar to pascal', function () {
    $bar = Pressure::from('1 bar');

    expect(round($bar->to("pa")->value, 1))->toBe(100000.0)
        ->and(round($bar->toPa()->value, 1))->toBe(100000.0)
        ->and(round($bar->toPascal()->value, 1))->toBe(100000.0)
        ->and((string)$bar->toPascal())->toBe("100000 Pa");
});

it('can convert bar to kilopascal', function () {
    $bar = Pressure::from('1 bar');

    expect(round($bar->to("kpa")->value, 1))->toBe(100.0)
        ->and(round($bar->toKpa()->value, 1))->toBe(100.0)
        ->and(round($bar->toKiloPascal()->value, 1))->toBe(100.0);

});

it('can convert bar to megapascal', function () {
    $bar = Pressure::from('1 bar');

    expect($bar->to("mpa")->value)->toBe(0.1)
        ->and($bar->toMpa()->value)->toBe(0.1)
        ->and($bar->toMegaPascal()->value)->toBe(0.1);
});

it('can convert bar to psi', function () {
    $bar = Pressure::from('1 bar');

    expect(round($bar->to("psi")->value, 3))->toBe(14.504)
        ->and(round($bar->toPsi()->value, 3))->toBe(14.504)
        ->and(round($bar->toPoundPerSquareInch()->value, 3))->toBe(14.504);
});


it('can convert bar to atmosphere', function () {

    $bar = Pressure::from('1 bar');

    expect(round($bar->to("atm")->value, 3))->toBe(0.987)
        ->and(round($bar->toAtm()->value, 3))->toBe(0.987)
        ->and(round($bar->toAtmosphere()->value, 3))->toBe(0.987);

});


it('can convert bar to torr', function () {

    $bar = Pressure::from('1 bar');

    expect(round($bar->to("torr")->value, 3))->toBe(750.062)
        ->and(round($bar->toTorr()->value, 3))->toBe(750.062)
        ->and(round($bar->toMillimeterOfMercury()->value, 3))->toBe(750.062);

});


it('can convert bar to inches of mercury', function () {

    $bar = Pressure::from('1 bar');

    expect(round($bar->to("inhg")->value, 2))->toBe(29.53)
        ->and(round($bar->toInhg()->value, 2))->toBe(29.53)
        ->and(round($bar->toInchesOfMercury()->value, 2))->toBe(29.53);
});
