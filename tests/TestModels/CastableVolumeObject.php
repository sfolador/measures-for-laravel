<?php

namespace Sfolador\Measures\Tests\TestModels;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Sfolador\Measures\Cast\Volume;

class CastableVolumeObject extends Model
{
    use hasFactory;

    protected $table = 'castables';

    protected $casts = [
        'measure' => Volume::class,
    ];
}
