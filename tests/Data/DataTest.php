<?php

use Sfolador\Measures\Unit\Data\Data;

it('can convert megabytes in bytes', function () {
    $m = Data::from('2.0 megabytes');
    expect($m->toBytes()->value)->toBe(2000000.0)
        ->and($m->toB()->value)->toBe(2000000.0)
        ->and((string) $m->toBytes())->toBe('2000000 B');
});

it('can convert bytes in megabytes', function () {
    $m = Data::from('2000000.0 bytes');
    expect($m->toMegabytes()->value)->toBe(2.0)
        ->and($m->toMB()->value)->toBe(2.0)
        ->and((string) $m->toMegabytes())->toBe('2 MB');
});

it('can convert megabytes in kilobytes', function () {
    $m = Data::from('2.0 megabytes');
    expect($m->toKilobytes()->value)->toBe(2000.0)
        ->and($m->toKB()->value)->toBe(2000.0)
        ->and((string) $m->toKilobytes())->toBe('2000 kB');
});

it('can convert megabytes to mebibytes', function () {
    $m = Data::from('2.0 megabytes');
    expect($m->toMebibytes()->value)->toBe(1.9073)
        ->and($m->toMiB()->value)->toBe(1.9073)
        ->and((string) $m->toMebibytes())->toBe('1.9073 MiB');
});
