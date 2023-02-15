<?php

namespace Sfolador\Measures\Commands;

use Illuminate\Console\Command;

class MeasuresCommand extends Command
{
    public $signature = 'measures-for-laravel';

    public $description = 'My command';

    public function handle(): int
    {
        $this->comment('All done');

        return self::SUCCESS;
    }
}
