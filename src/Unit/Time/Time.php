<?php

namespace Sfolador\Measures\Unit\Time;

use Sfolador\Measures\Unit\Measure;

/**
 * @method Time toSeconds() Convert to seconds
 * @method Time toMinutes() Convert to minutes
 * @method Time toHours() Convert to hours
 * @method Time toDays() Convert to days
 * @method Time toWeeks() Convert to weeks
 * @method Time toMonths() Convert to months
 * @method Time toYears() Convert to years
 * @method Time toS() Convert to seconds
 * @method Time toM() Convert to minutes
 * @method Time toH() Convert to hours
 * @method Time toD() Convert to days
 * @method Time toW() Convert to weeks
 * @method Time toMo() Convert to months
 * @method Time toY() Convert to years
 */
class Time extends Measure
{
    public static string $unitClass = UnitsOfTime::class;
}
