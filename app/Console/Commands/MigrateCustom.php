<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Schema;

class MigrateCustom extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'migrate:custom';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Run migrations in a custom order';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        echo database_path('migrations/');

        $tables = [
            'users',
            'password_reset_tokens',
            'sessions',
            'cache',
            'cache_locks',
            'jobs',
            'job_batches',
            'failed_jobs',
            'invitations',
            'refutes',
            'family_members',
            'people',
            'people_address',
            'people_telp',
            'families',
            'accounts',
        ];

        $this->info('Dropping tables...');

        // Disable FK agar tidak error
        Schema::disableForeignKeyConstraints();

        foreach ($tables as $table) {
            Schema::dropIfExists($table);
            $this->line("Dropped: {$table}");
        }

        Schema::enableForeignKeyConstraints();

        $this->newLine();
        $this->info('Running migrate...');

        // Menjalankan migrasi terbaru secara manual
        $migrations = [
            '0001_01_01_000000_create_users_table.php',
            '0001_01_01_000001_create_cache_table.php',
            '0001_01_01_000002_create_jobs_table.php',
            '2026_01_02_095729_create_accounts_table.php',
            '2025_12_29_044209_create_families_table.php',
            '2025_12_29_043920_create_people_table.php',
            '2025_12_29_044344_create_family_members_table.php',
            '2026_01_02_100437_create_refutes_table.php',
            '2026_01_02_101437_create_invitations_table.php'
            // Tambahkan migrasi lainnya sesuai urutan yang diinginkan
        ];

        foreach ($migrations as $migration) {
            $this->line("Migrate: {$migration}");
            Artisan::call('migrate', [
                '--path' => 'database/migrations/' . $migration
            ]);
        }

        $this->info('Migrasi selesai.');
    }
}
