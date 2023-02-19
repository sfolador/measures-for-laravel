<?php

namespace Sfolador\Measures\Unit\Data;

use Sfolador\Measures\Unit\Measure;

/**
 * @method Data toBytes() Convert to bytes
 * @method Data toB() Convert to bytes
 * @method Data toKilobytes() Convert to kilobytes
 * @method Data toKB() Convert to kilobytes
 * @method Data toKilobits() Convert to kilobits
 * @method Data toMebibytes() Convert to mebibytes
 * @method Data toMiB() Convert to mebibytes
 * @method Data toMebibits() Convert to mebibits
 * @method Data toMibit() Convert to mebibits
 * @method Data toGibibytes() Convert to gibibytes
 * @method Data toGiB() Convert to gibibytes
 * @method Data toGibibits() Convert to gibibits
 * @method Data toGibit() Convert to gibibits
 * @method Data toTebibytes() Convert to tebibytes
 * @method Data toTiB() Convert to tebibytes
 * @method Data toTebibits() Convert to tebibits
 * @method Data toTibit() Convert to tebibits
 * @method Data toPebibytes() Convert to pebibytes
 * @method Data toPiB() Convert to pebibytes
 * @method Data toPebibits() Convert to pebibits
 */
class Data extends Measure
{
    public static string $unitClass = UnitsOfData::class;
}
