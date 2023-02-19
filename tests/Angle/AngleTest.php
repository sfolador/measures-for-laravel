<?php

use Sfolador\Measures\Unit\Angle\Angle;

it('can convert radians to degrees', function () {
    $angle = Angle::from('1 rad');
    expect($angle->toDegrees()->value)->toBe(57.2958)
        ->and($angle->toDeg()->value)->toBe(57.2958)
        ->and($angle->to('deg')->value)->toBe(57.2958)
        ->and((string) $angle->toDegrees())->toBe('57.2958 º');
});
