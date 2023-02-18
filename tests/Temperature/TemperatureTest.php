<?php

use Sfolador\Measures\Unit\Temperature\Temperature;
use Sfolador\Measures\Unit\Temperature\UnitsOfTemperature;

it('can convert from celsius to fahrenheit', function () {
    $temperature = Temperature::from('100Cdeg');

    $round = round($temperature->toFdeg()->value);
    expect($round)->toBe(212.0);
});

it('can convert from celsius to kelvin', function () {
    $temperature = Temperature::from('100Cdeg');

    $round = round($temperature->toKdeg()->value);
    expect($round)->toBe(373.0);
});

it('can convert from fahrenheit to celsius', function () {
    $temperature = Temperature::from('100Fdeg');

    $round = round($temperature->toCdeg()->value, 1);
    expect($round)->toBe(37.8);
});

it('can convert from fahrenheit to kelvin', function () {
    $temperature = Temperature::from('100Fdeg');
    $round = round($temperature->toKdeg()->value, 3);

    expect($round)->toBe(310.928);
});

it('can convert from kelvin to celsius', function () {
    $temperature = Temperature::from('100Kdeg');

    $round = round($temperature->toCdeg()->value, 1);
    expect($round)->toBe(-173.2);
});

it('can convert from kelvin to fahrenheit', function () {
    $temperature = Temperature::from('100Kdeg');

    $round = round($temperature->toFdeg()->value, 1);
    expect($round)->toBe(-279.7);
});

it('can convert from celsius to fahrenheit with full name', function () {
    $temperature = Temperature::from('100 Celsius');

    $round = round($temperature->toFahrenheit()->value);
    expect($round)->toBe(212.0);
});

it('can convert from celsius to kelvin with full name', function () {
    $temperature = Temperature::from('100 Celsius');

    $round = round($temperature->toKelvin()->value);
    expect($round)->toBe(373.0);
});

it('can convert from fahrenheit to celsius with full name', function () {
    $temperature = Temperature::from('100 Fahrenheit');

    $round = round($temperature->toCelsius()->value, 1);
    expect($round)->toBe(37.8);
});

it('can convert from fahrenheit to kelvin with full name', function () {
    $temperature = Temperature::from('100 Fahrenheit');
    $round = round($temperature->toKelvin()->value, 3);

    expect($round)->toBe(310.928);
});

it('can convert from celsius to fahrenheit with degrees symbol', function () {
    $temperature = Temperature::from('100 ºC');

    $round = round($temperature->toFdeg()->value);
    expect($round)->toBe(212.0);
});

it('can convert from celsius to kelvin with degrees symbol', function () {
    $temperature = Temperature::from('100 ºC');

    $round = round($temperature->toKdeg()->value);
    expect($round)->toBe(373.0);
});

it('can convert from fahrenheit to celsius with degrees symbol', function () {
    $temperature = Temperature::from('100 ºF');

    $round = round($temperature->toCdeg()->value, 1);
    expect($round)->toBe(37.8);
});

it('can convert from fahrenheit to kelvin with degrees symbol', function () {
    $temperature = Temperature::from('100 ºF');
    $round = round($temperature->toKdeg()->value, 3);

    expect($round)->toBe(310.928);
});

it('can convert from kelvin to celsius with degrees symbol', function () {
    $temperature = Temperature::from('100 ºK');

    $round = round($temperature->toCdeg()->value, 1);
    expect($round)->toBe(-173.2);
});

it('can convert from kelvin to fahrenheit with degrees symbol', function () {
    $temperature = Temperature::from('100 ºK');

    $round = round($temperature->toFdeg()->value, 1);
    expect($round)->toBe(-279.7);
});

it('can correct units to a correct notation', function () {
    $cases = UnitsOfTemperature::cases();
    foreach ($cases as $case) {
        if ($case === UnitsOfTemperature::CELSIUS) {
            expect($case->correctNotation())->toBe('ºC');
        } elseif ($case === UnitsOfTemperature::FAHRENHEIT) {
            expect($case->correctNotation())->toBe('ºF');
        } elseif ($case === UnitsOfTemperature::KELVIN || $case === UnitsOfTemperature::KELVIN_DEG) {
            expect($case->correctNotation())->toBe('ºK');
        } else {
            expect($case->correctNotation())->toBe($case->value);
        }
    }
});



it('can use extended names to convert units', function () {
    $volume = Temperature::from('100 Celsius');

    $round = round($volume->toFahrenheit()->value);
    expect($round)->toBe(212.0);

    $round = round($volume->toKelvin()->value);
    expect($round)->toBe(373.0);

    $round = round($volume->toCelsius()->value, 1);
    expect($round)->toBe(100.0);

});
