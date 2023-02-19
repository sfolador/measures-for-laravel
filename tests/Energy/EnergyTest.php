<?php

use Sfolador\Measures\Unit\Energy\Energy;

it('can convert joules to calories', function () {
    $m = Energy::from('1000J');
    expect($m->toCal()->value)->toBe(0.2390057361)
        ->and($m->toCalories()->value)->toBe(0.2390057361);
});
