<?php

use Sfolador\Measures\Unit\Time\Time;

it('can convert nanoseconds to seconds', function () {
    $time = Time::from('1 ns');

    expect($time->to('s')->realValue())->toBe(0.000000001);
});

it('can convert nanoseconds to milliseconds', function () {
    $time = Time::from('1 ns');

    $rounded = round($time->to('ms')->realValue(), 6);

    expect($rounded)->toBe(0.000001);
});

it('can convert nanoseconds to microseconds', function () {
    $time = Time::from('1 ns');

    expect($time->to('us')->value)->toBe(0.001);
});

it('can convert minutes to nanoseconds', function () {
    $time = Time::from('1 min');

    expect($time->to('ns')->value)->toBe(60000000000.0);
});

it('can convert minutes to microseconds', function () {
    $time = Time::from('1 min');

    expect($time->to('us')->value)->toBe(60000000.0);
});

it('can convert minutes to milliseconds', function () {
    $time = Time::from('1 min');

    expect($time->to('ms')->value)->toBe(60000.0);
});

it('can convert minutes to seconds', function () {
    $time = Time::from('1 min');

    expect($time->to('s')->value)->toBe(60.0);
});

it('can convert minutes to hours', function () {
    $time = Time::from('1 min');

    $rounded = round($time->to('h')->realValue(), 10);

    expect($rounded)->toBe(0.0166666667);
});

it('can convert minutes to days', function () {
    $time = Time::from('1 min');

    $rounded = round($time->to('d')->realValue(), 10);

    expect($rounded)->toBe(0.0006944444);
});

it('can convert weeks to minutes', function () {
    $time = Time::from('1 w');

    $rounded = round($time->to('min')->value, 10);

    expect($rounded)->toBe(10080.0);
});

it('can convert weeks to hours', function () {
    $time = Time::from('1 w');

    $rounded = round($time->to('h')->value, 10);

    expect($rounded)->toBe(168.0);
});

it('can convert weeks to days', function () {
    $time = Time::from('1 w');

    $rounded = round($time->to('d')->value, 10);

    expect($rounded)->toBe(7.0);
});

it('can convert weeks to seconds', function () {
    $time = Time::from('1 w');

    $rounded = round($time->to('s')->value, 10);

    expect($rounded)->toBe(604800.0);
});

it('can convert weeks to milliseconds', function () {
    $time = Time::from('1 w');

    $rounded = round($time->to('ms')->value, 10);

    expect($rounded)->toBe(604800000.0);
});

it('can convert seconds to milliseconds with extended format', function () {
    $time = Time::from('1 second');

    $rounded = round($time->to('milliseconds')->value, 10);

    expect($rounded)->toBe(1000.0);
});

it('can write the number of seconds from minutes', function () {
    $time = Time::from('1 minute');

    $rounded = round($time->to('seconds')->value, 10);

    expect($rounded)->toBe(60.0)
    ->and((string) $time->to('seconds'))
    ->toBe('60 s');
});
