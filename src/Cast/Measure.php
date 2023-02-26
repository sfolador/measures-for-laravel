<?php

declare(strict_types=1);

namespace Sfolador\Measures\Cast;

use Illuminate\Contracts\Database\Eloquent\CastsAttributes;
use InvalidArgumentException;
use Sfolador\Measures\Facades\Measures;

/* @phpstan-ignore-next-line */
class Measure implements CastsAttributes
{
    /**
     * @return \Sfolador\Measures\Unit\Measure|null
     */
    public function get($model, string $key, $value, array $attributes)
    {
        if (is_null($value)) {
            return null;
        }
        /* @phpstan-ignore-next-line */
        return Measures::from($value);
    }

    public function set($model, string $key, $value, array $attributes): string
    {
        if (is_null($value)) {
            return '';
        }
        if (! $value instanceof \Sfolador\Measures\Unit\Measure) {
            throw new InvalidArgumentException("The value must be an instance of Sfolador\Measures\Unit\Measure");
        }

        return (string) $value;
    }
}
