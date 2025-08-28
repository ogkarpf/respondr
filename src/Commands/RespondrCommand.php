<?php

namespace ogkarpf\respondr\Commands;

use Illuminate\Console\Command;

class RespondrCommand extends Command
{
    public $signature = 'respondr';

    public $description = 'My command';

    public function handle(): int
    {
        $this->comment('All done');

        return self::SUCCESS;
    }
}
