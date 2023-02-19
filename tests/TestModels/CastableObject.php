<?php

namespace Sfolador\Measures\Tests\TestModels;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Sfolador\Measures\Cast\Measure;

class CastableObject extends Model
{
    use hasFactory;

    protected $table = 'castables';

    protected $casts = [
        'measure' => Measure::class,
    ];
}
