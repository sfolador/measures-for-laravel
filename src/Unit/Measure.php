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

    private float $realValue;

    final public function __construct(public float $value, public Units $unit)
    {
        $this->realValue = $value;
    }

    public static function detectUnit(string $expression): ?Units
    {
        $unit = null;
        if (! empty($expression)) {
            $expression = Str::of($expression)->trim()->lower()->squish()->value();
            $unit = (static::$unitClass)::tryFrom($expression);

            if (! $unit) {
                $unit = (static::$unitClass)::extendedValues($expression);
            }
        }

        return $unit;
    }

    public static function from(string $expression): static
    {
        $expression = static::squish($expression);

        [$value,$unit] = static::getValueAndUnit($expression);

        return new static($value, $unit);
    }

    public function to(string|Units $destination): static
    {
        if (is_string($destination)) {
            $destination = static::detectUnit($destination);
        }

        if ($destination === null) {
            throw new BadMethodCallException('Invalid unit.');
        }

        $convertedValue = $this->unit->to($this->value, $destination);

        $this->realValue = $convertedValue;
        /* @phpstan-ignore-next-line */
        $this->value = round($convertedValue, config('measures.default_precision', 4));
        $this->unit = $destination;

        return $this;
    }

    public function realValue(): float
    {
        return $this->realValue;
    }

    public static function extractValue(string $expression): ?string
    {
        $results = Str::of($expression)->trim()->explode(' ')->first();
        /* @phpstan-ignore-next-line */
        if (Str::of($results)->length() === Str::of($expression)->length()) {
            return Str::of($expression)->match('/[\d.+]+/')->value();
        }

        return $results;
    }

    /**
     * @return array{float, Units}
     */
    public static function getValueAndUnit(string $expression): array
    {
        $value = static::extractValue($expression);
        $expression = Str::remove((string) $value, $expression);

        $unit = static::detectUnit($expression);

        if ($unit === null) {
            throw new BadMethodCallException('Invalid unit.');
        }

        return [(float) $value, $unit];
    }

    public function __toString(): string
    {
        return $this->value.' '.$this->unit->toStringNotation();
    }

    public function unitClass(): string
    {
        return static::$unitClass;
    }

    /**
     * @param  array<mixed,mixed>  $arguments
     * @return Measure
     */
    public function __call(string $name, array $arguments)
    {
        if (Str::startsWith($name, 'to')) {
            $unit = Str::of($name)->after('to')->lower()->value();

            return $this->to($unit);
        }

        throw new BadMethodCallException("Method $name does not exist.");
    }
}
