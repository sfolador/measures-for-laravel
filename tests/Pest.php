<?php

use Illuminate\Foundation\Testing\LazilyRefreshDatabase;
use Sfolador\Measures\Tests\TestCase;

uses(TestCase::class,  LazilyRefreshDatabase::class)->in(__DIR__);
