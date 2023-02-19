<?php

namespace Sfolador\Measures\Tests\database\factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Sfolador\Locked\Tests\TestClasses\TestModel;
use Sfolador\Measures\Tests\TestModels\CastableObject;

class CastableObjectFactory extends Factory
{
    protected $model = CastableObject::class;

    public function definition(): array
    {
        return [
        ];
    }


}
