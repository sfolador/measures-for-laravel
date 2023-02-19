<?php

use Sfolador\Measures\Facades\Measures as MeasuresFacade;
use Sfolador\Measures\Measures;
use Sfolador\Measures\MeasuresInterface;
use Sfolador\Measures\Unit\Angle\Angle;
use Sfolador\Measures\Unit\Area\Area;
use Sfolador\Measures\Unit\Energy\Energy;
use Sfolador\Measures\Unit\Length\Length;
use Sfolador\Measures\Unit\Power\Power;
use Sfolador\Measures\Unit\Pressure\Pressure;
use Sfolador\Measures\Unit\Speed\Speed;
use Sfolador\Measures\Unit\Temperature\Temperature;
use Sfolador\Measures\Unit\Time\Time;
use Sfolador\Measures\Unit\Volume\Volume;
use Sfolador\Measures\Unit\Weight\Weight;

it('can be instantiated', function () {
    $measures = new Measures();

    expect($measures)->toBeInstanceOf(Measures::class);
});

it('can convert length', function () {
    $measures = new Measures();

    expect($measures->length('2.0m'))->toBeInstanceOf(Length::class);
});

it('can convert weight', function () {
    $measures = new Measures();

    expect($measures->weight('2.0g'))->toBeInstanceOf(Weight::class);
});

it('can convert volume', function () {
    $measures = new Measures();

    expect($measures->volume('2.0l'))->toBeInstanceOf(Volume::class);
});

it('can convert a temperature', function () {
    $measures = new Measures();

    expect($measures->temperature('200ºC'))->toBeInstanceOf(Temperature::class);
});

it('can convert an area', function () {
    $measures = new Measures();

    expect($measures->area('200km2'))->toBeInstanceOf(Area::class);
});

it('can convert a speed', function () {
    $measures = new Measures();

    expect($measures->speed('100 Km/h'))->toBeInstanceOf(Speed::class);
});

it('can convert a time', function () {
    $measures = new Measures();

    expect($measures->time('1 ns'))->toBeInstanceOf(Time::class);
});

it('can convert a pressure', function () {
    $measures = new Measures();

    expect($measures->pressure('1 pa'))->toBeInstanceOf(Pressure::class);
});

it('can convert an energy', function () {
    $measures = new Measures();

    expect($measures->energy('1 J'))->toBeInstanceOf(Energy::class);
});

it('can convert a power', function () {
    $measures = new Measures();

    expect($measures->power('1 W'))->toBeInstanceOf(Power::class);
});

it('can convert an angle', function () {
    $measures = new Measures();

    expect($measures->angle('1 rad'))->toBeInstanceOf(Angle::class);
});

it('can be instantiated with a facade', function () {
    $measures = MeasuresFacade::length('2.0m');
    expect($measures)->toBeInstanceOf(Length::class);

    $measures = MeasuresFacade::weight('2.0kg');
    expect($measures)->toBeInstanceOf(Weight::class);
});

it('can be instantiated with a facade through the app', function () {
    $measuresLength = app(MeasuresInterface::class)->length('2.0m');
    $measuresWeight = app(MeasuresInterface::class)->weight('2.0kg');

    expect($measuresLength)->toBeInstanceOf(Length::class)
        ->and($measuresWeight)->toBeInstanceOf(Weight::class);
});

it('can detect automatically the measure', function () {
    expect(MeasuresFacade::from('2.0m'))->toBeInstanceOf(Length::class)
        ->and(MeasuresFacade::from('2.0kg'))->toBeInstanceOf(Weight::class)
        ->and(MeasuresFacade::from('2.0l'))->toBeInstanceOf(Volume::class)
        ->and(MeasuresFacade::from('2.0ºC'))->toBeInstanceOf(Temperature::class)
        ->and(MeasuresFacade::from('2.0km2'))->toBeInstanceOf(Area::class)
        ->and(MeasuresFacade::from('2.0km/h'))->toBeInstanceOf(Speed::class)
        ->and(MeasuresFacade::from('2.0ns'))->toBeInstanceOf(Time::class)
        ->and(MeasuresFacade::from('2.0Pa'))->toBeInstanceOf(Pressure::class)
        ->and(MeasuresFacade::from('2.0J'))->toBeInstanceOf(Energy::class)
        ->and(MeasuresFacade::from('2.0W'))->toBeInstanceOf(Power::class)
        ->and(MeasuresFacade::from('2.0deg'))->toBeInstanceOf(Angle::class);
});
