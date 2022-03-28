<?php namespace Mia\Database\Command;

use Illuminate\Database\Migrations\DatabaseMigrationRepository;
use Illuminate\Database\Migrations\Migrator;
use Illuminate\Support\Facades\Schema;
use Illuminate\Filesystem\Filesystem;

/**
 * Description of BaseCommand
 *
 * @author matiascamiletti
 */
class MigrateCommand extends BaseMigrationCommand
{
    public function run()
    {
        $this->migrator->run([
            'vendor/agencycoda/mia-core-mezzio/database/migrations',
            'vendor/agencycoda/mia-auth-mezzio/database/migrations',
            'vendor/agencycoda/mia-mail-mezzio/database/migrations',
            'vendor/agencycoda/mia-legal-mezzio/database/migrations',
            'database/migrations'
        ]);
    }
}