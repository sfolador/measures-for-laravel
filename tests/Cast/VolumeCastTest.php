<?php

use Sfolador\Measures\Facades\Measures as MeasuresFacade;
use Sfolador\Measures\Tests\TestModels\CastableVolumeObject;
use Sfolador\Measures\Unit\Volume\Volume;

it('can have a null attribute', function () {
    $a = CastableVolumeObject::factory()->create();
    expect($a->measure)->toBeNull();
});

it('can save a measure in a model', function () {
    $a = CastableVolumeObject::factory()->create([
        'measure' => MeasuresFacade::from('1l'),
    ]);
    expect($a->measure)->toBeInstanceOf(Volume::class);
});

it('can retrieve an attribute', function () {
    $a = CastableVolumeObject::factory()->create();
    $a->measure = MeasuresFacade::from('1l');
    $a->save();

    $b = CastableVolumeObject::find($a->id);

    expect($b->measure)->toBeInstanceOf(Volume::class)
        ->and($b->measure->value)->toBe(1.0);
});

it('can retrieve an empty attribute', function () {
    $a = CastableVolumeObject::factory()->create();
    $a->measure = null;
    $a->save();

    $b = CastableVolumeObject::find($a->id);

    //dd($b);
    expect($b->measure)->toBeNull();
});

it('saves measure as string in db', function () {
    $a = CastableVolumeObject::factory()->create([
        'measure' => MeasuresFacade::from('1l'),
    ]);
    $original = $a->getRawOriginal('measure');
    expect($original)->toBe('1 l');
});

it('throws an exception if the value is not a measure', function () {
    CastableVolumeObject::factory()->create([
        'measure' => 'wrong-value',
    ]);
})->throws(InvalidArgumentException::class, 'The value must be an instance of Sfolador\Measures\Unit\Volume\Volume');
