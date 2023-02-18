<?php

declare(strict_types=1);

namespace Sfolador\Measures\Unit;

use BadMethodCallException;
use Illuminate\Support\Str;
use Sfolador\Measures\Utilities\SquishesStrings;

class Measure
{
    use SquishesStrings;

    public static string $unitClass = Units::class;

    final public function __construct(public float $value, public $unit)
    {
    }

    public static function extractUnit(mixed $expression): ?Units
    {
        if (is_string($expression) && ! empty($expression)) {
            $expression = Str::of($expression)->trim()->lower()->squish()->value();

            return (static::$unitClass)::tryFrom($expression);
        }

        if ($expression instanceof Units) {
            return $expression;
        }

        return null;
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

        $this->value = $convertedValue;
        $this->unit = $destination;

        return $this;
    }

    public static function extractValue(string $expression): float
    {
        return (float) preg_replace('/[^0-9.]/', '', $expression);
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
        return $this->value.' '.$this->unit->correctNotation();
    }

    public function unitClass(): string
    {
        return static::$unitClass;
    }

    public function __call(string $name, array $arguments)
    {
        if (Str::startsWith($name, 'to')) {
            $unit = Str::of($name)->after('to')->lower()->value();

            return $this->to($unit);
        }

        throw new BadMethodCallException("Method $name does not exist.");
    }
}
