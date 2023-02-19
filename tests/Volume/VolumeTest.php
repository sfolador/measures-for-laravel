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
    $round = round($volume->toFt3()->value, 10);
    expect($round)->toBe(0.0706293334);
});

it('can convert liters to cubic inches', function () {
    $volume = Volume::from('2L');
    $round = round($volume->toIn3()->value, 7);
    expect($round)->toBe(122.0474882);
});

it('can convert liters to gallons', function () {
    $volume = Volume::from('2L');
    $round = round($volume->toGal()->value, 6);
    expect($round)->toBe(0.528344);
});

it('can convert liters to pints', function () {
    $volume = Volume::from('2L');
    $round = round($volume->toPt()->value, 6);
    expect($round)->toBe(4.226753);
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
    $round = round($volume->toM3()->value, 5);

    expect($round)->toBe(0.00757);
});

it('can convert gallons to cubic feet', function () {
    $volume = Volume::from('2gal');

    $round = round($volume->toFt3()->value, 9);
    expect($round)->toBe(0.267361111);
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
    $round = round($volume->toCup()->value, 5);
    expect($round)->toBe(8.45351);
});

it('can correct units to a correct notation', function () {
    $cases = UnitsOfVolume::cases();
    foreach ($cases as $case) {
        expect($case->toStringNotation())->toBe($case->value);
    }
});

it('can use extended names to convert units', function () {
    $volume = Volume::from('2 liters');

    $round = round($volume->toCubicMeters()->value, 5);
    expect($round)->toBe(0.002);

    $round = round($volume->toCubicFeet()->value, 9);
    expect($round)->toBe(0.070629333);

    $round = round($volume->toCubicInches()->value, 7);
    expect($round)->toBe(122.0474882);

    $round = round($volume->toGallons()->value, 6);
    expect($round)->toBe(0.528344);

    $round = round($volume->toPints()->value, 6);
    expect($round)->toBe(4.226753);

    $round = round($volume->toCups()->value, 4);
    expect($round)->toBe(8.4535);
});
