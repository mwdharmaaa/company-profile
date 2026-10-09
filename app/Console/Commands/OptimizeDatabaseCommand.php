<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class OptimizeDatabaseCommand extends Command
{
    protected $signature = 'db:optimize-sqlite';
    protected $description = 'Execute VACUUM, PRAGMA optimize, and index reindex on SQLite';

    public function handle(): int
    {
        $this->info('Starting SQLite database optimization...');

        DB::statement('PRAGMA optimize;');
        DB::statement('VACUUM;');

        $this->info('[OK] SQLite database vacuumed and query planner statistics updated.');
        return 0;
    }
}
