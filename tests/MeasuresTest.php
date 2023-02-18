<?php

use Sfolador\Measures\Facades\Measures as MeasuresFacade;
use Sfolador\Measures\Measures;
use Sfolador\Measures\MeasuresInterface;
use Sfolador\Measures\Unit\Length\Length;
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
