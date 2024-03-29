<?php

namespace Sfolador\Measures\Tests;

use Illuminate\Database\Eloquent\Factories\Factory;
use Orchestra\Testbench\TestCase as Orchestra;
use Sfolador\Measures\MeasuresServiceProvider;

use function Orchestra\Testbench\artisan;

class TestCase extends Orchestra
{
    protected function setUp(): void
    {
        parent::setUp();

        Factory::guessFactoryNamesUsing(
            fn (string $modelName) => 'Sfolador\\Measures\\Tests\\database\\factories\\'.class_basename($modelName).'Factory'
        );
    }

    protected function getPackageProviders($app)
    {
        return [
            MeasuresServiceProvider::class,
        ];
    }

//    public function defineEnvironment($app)
//    {
//        // Setup default database to use sqlite :memory:
//        $app['config']->set('database.default', 'testbench');
//        $app['config']->set('database.connections.testbench', [
//            'driver' => 'sqlite',
//            'database' => ':memory:',
//            'prefix' => '',
//        ]);
//    }

    public function getEnvironmentSetUp($app)
    {
        config()->set('database.default', 'testbench');
        config()->set('database.connections.testbench', [
            'driver' => 'sqlite',
            'database' => ':memory:',
            'prefix' => '',
        ]);
    }

    protected function defineDatabaseMigrations()
    {
        $this->loadMigrationsFrom(__DIR__.'/database/migrations');

//        artisan($this, 'migrate', ['--database' => 'testbench']);
//
//        $this->beforeApplicationDestroyed(
//            fn () => artisan($this, 'migrate:rollback', ['--database' => 'testbench'])
//        );
    }
}
