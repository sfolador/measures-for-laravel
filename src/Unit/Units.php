<?php

declare(strict_types=1);

namespace Sfolador\Measures\Unit;

interface Units
{
    public function convertFromBase(float $value): float;

    public function convertToBase(float $value): float;

    public function to(float $value, Units $destination): float;

    public function convert(float $value, Units $destination): float;

    public function toStringNotation(): string;

    public static function extendedValues(string $unitName): self;
}
