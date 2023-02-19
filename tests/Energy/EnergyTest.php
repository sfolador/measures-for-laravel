<?php

use Sfolador\Measures\Unit\Energy\Energy;

it('can convert joules to calories', function () {
    $m = Energy::from('1000J');
    expect($m->toCal()->value)->toBe(0.239)
        ->and($m->toCalories()->value)->toBe(0.239)
        ->and((string) $m->toCal())->toBe('0.239 cal');
});

it('can convert megajoules to watt hour', function () {
    $m = Energy::from('1MJ');
    expect($m->toWh()->value)->toBe(277.7778)
        ->and($m->toWattHour()->value)->toBe(277.7778);
});

it('can convert kilojoules to kilowatt hour', function () {
    $m = Energy::from('1kJ');
    expect($m->toKwh()->value)->toBe(0.0003)
        ->and($m->toKilowattHour()->value)->toBe(0.0003);
});

it('can convert megajoules to megawatt hour', function () {
    $m = Energy::from('1MJ');
    expect($m->toMwh()->value)->toBe(0.0003)
        ->and($m->toMegawattHour()->value)->toBe(0.0003);
});

it('can convert kilojoule to calories', function () {
    $m = Energy::from('1kJ');
    expect($m->toCal()->value)->toBe(0.239)
        ->and($m->toCalories()->value)->toBe(0.239);
});

it('can convert kilojoule to kilocalories', function () {
    $m = Energy::from('1kJ');
    expect($m->toKcal()->value)->toBe(0.239)
        ->and($m->toKilocalories()->value)->toBe(0.239);
});

it('can convert  joule to megaelettronvolt', function () {
    $m = Energy::from('1J');
    expect($m->toMev()->value)->toBe(6241509074460.763);
});
