<?php

namespace Sfolador\Measures;

use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

class MeasuresServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        /*
         * This class is a Package Service Provider
         *
         * More info: https://github.com/spatie/laravel-package-tools
         */
        $package
            ->name('measures-for-laravel');
    }

    public function registeringPackage()
    {
       $this->app->bind(MeasuresInterface::class, function () {
           return new Measures();
       });
    }
}
