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

    final public function __construct(public float $value, public Units $unit)
    {
    }

    public static function detectUnit(string $expression): ?Units
    {
        $unit = null;
        if (! empty($expression)) {
            $expression = Str::of($expression)->trim()->lower()->squish()->value();
            //   var_dump($expression);
            $unit = (static::$unitClass)::tryFrom($expression);
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

        $this->value = $convertedValue;
        $this->unit = $destination;

        return $this;
    }

    public static function extractValue(string $expression): ?string
    {
        return preg_replace('/[^\d+.]/', '', $expression);
    }

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
        return $this->value.' '.$this->unit->correctNotation();
    }

    public function unitClass(): string
    {
        return static::$unitClass;
    }

    /**
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
