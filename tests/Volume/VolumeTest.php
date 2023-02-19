<?php

use Sfolador\Measures\Unit\Volume\UnitsOfVolume;
use Sfolador\Measures\Unit\Volume\Volume;

it('can convert liters to milliliters', function () {
    $volume = Volume::from('2L');
    expect($volume->toMl()->value)->toBe(2000.0);
});

it('can convert liters to cubic meters', function () {
    $volume = Volume::from('2L');
    expect($volume->toM3()->value)->toBe(0.002);
});

it('can convert liters to cubic feet', function () {
    $volume = Volume::from('2L');
    expect($volume->toFt3()->value)->toBe(0.0706);
});

it('can convert liters to cubic inches', function () {
    $volume = Volume::from('2L');
    expect($volume->toIn3()->value)->toBe(122.0475);
});

it('can convert liters to gallons', function () {
    $volume = Volume::from('2L');
    expect($volume->toGal()->value)->toBe(0.5283);
});

it('can convert liters to pints', function () {
    $volume = Volume::from('2L');
    expect($volume->toPt()->value)->toBe(4.2268);
});

it('can convert liters to cups', function () {
    $volume = Volume::from('2L');
    $round = round($volume->toCup()->value, 4);
    expect($round)->toBe(8.4535);
});

it('can convert gallons to milliliters', function () {
    $volume = Volume::from('2gal');

    $round = round($volume->toMl()->value, 4);

    expect($round)->toBe(7570.8236);
});

it('can convert gallons to liters', function () {
    $volume = Volume::from('2gal');
    $round = round($volume->toL()->value, 4);
    expect($round)->toBe(7.5708);
});

it('can convert gallons to cubic meters', function () {
    $volume = Volume::from('2gal');

    expect($volume->toM3()->value)->toBe(0.0076);
});

it('can convert gallons to cubic feet', function () {
    $volume = Volume::from('2gal');

    expect($volume->toFt3()->value)->toBe(0.2674);
});

it('can convert gallons to cubic inches', function () {
    $volume = Volume::from('2gal');
    $round = round($volume->toIn3()->value, 1);
    expect($round)->toBe(462.0);
});

it('can convert gallons to pints', function () {
    $volume = Volume::from('2gal');
    $round = round($volume->toPt()->value, 1);
    expect($round)->toBe(16.0);
});

it('can convert gallons to cups', function () {
    $volume = Volume::from('2L');
    expect($volume->toCup()->value)->toBe(8.4535);
});

it('can correct units to a correct notation', function () {
    $cases = UnitsOfVolume::cases();
    foreach ($cases as $case) {
        expect($case->toStringNotation())->toBe($case->value);
    }
});

it('can use extended names to convert units', function () {
    $volume = Volume::from('2 liters');

    expect($volume->toCubicMeters()->value)->toBe(0.002)
        ->and($volume->toCubicFeet()->value)->toBe(0.0706)
        ->and($volume->toCubicInches()->value)->toBe(121.9968)
        ->and($volume->toGallons()->value)->toBe(0.5281)
        ->and($volume->toPints()->value)->toBe(4.2248)
        ->and($volume->toCups()->value)->toBe(8.4496);
});
