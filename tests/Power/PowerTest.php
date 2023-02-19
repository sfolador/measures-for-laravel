<?php

it('can convert watts to horsepower', function () {
    $power = Sfolador\Measures\Unit\Power\Power::from('1000 W');

    expect($power->toHp()->value)->toBe(1.3410)
    ->and($power->toHorsePower()->value)->toBe(1.3410)
    ->and((string) $power->toHp())->toBe('1.341 hp');
});
