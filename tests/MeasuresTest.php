<?php

use Sfolador\Measures\Facades\Measures as MeasuresFacade;
use Sfolador\Measures\Measures;
use Sfolador\Measures\MeasuresInterface;
use Sfolador\Measures\Unit\Area\Area;
use Sfolador\Measures\Unit\Length\Length;
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


it('can detect automatically the measure',function(){
    expect(MeasuresFacade::from('2.0m'))->toBeInstanceOf(Length::class);
    expect(MeasuresFacade::from('2.0kg'))->toBeInstanceOf(Weight::class);
    expect(MeasuresFacade::from('2.0l'))->toBeInstanceOf(Volume::class);
    expect(MeasuresFacade::from('2.0ºC'))->toBeInstanceOf(Temperature::class);
    expect(MeasuresFacade::from('2.0km2'))->toBeInstanceOf(Area::class);
    expect(MeasuresFacade::from('2.0km/h'))->toBeInstanceOf(Speed::class);
    expect(MeasuresFacade::from('2.0ns'))->toBeInstanceOf(Time::class);

});
