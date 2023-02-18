<?php

declare(strict_types=1);

namespace Sfolador\Measures\Unit;

use Illuminate\Support\Str;
use Sfolador\Measures\Utilities\SquishesStrings;

class Measure
{
    use SquishesStrings;

    final public function __construct(public float $value, public $unit)
    {
    }

    public static function from(string $expression): static
    {
        $expression = static::squish($expression);

        [$value,$unit] = static::getValueAndUnit($expression);

        return new static($value, $unit);
    }

    public function to(mixed $destination): static
    {
        $destination = static::extractUnit($destination);
        $convertedValue = $this->unit->to($this->value, $destination);

        return new static($convertedValue, $destination);
    }

    public static function extractValue(string $expression): float
    {
        return (float) preg_replace('/[^0-9.]/', '', $expression);
    }

    public static function extractUnit(mixed $expression): mixed
    {
        return preg_replace('/[^a-zA-Z]/', '', $expression);
    }

    public static function getValueAndUnit($expression): array
    {
        $value = static::extractValue($expression);
        $expression = Str::remove($value, $expression);
        $unit = static::extractUnit($expression);

        return [$value, $unit];
    }

    public function __toString(): string
    {
        return $this->value.$this->unit;
    }
}
