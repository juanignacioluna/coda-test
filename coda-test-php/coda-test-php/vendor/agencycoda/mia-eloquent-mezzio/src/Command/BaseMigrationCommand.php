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
abstract class BaseMigrationCommand extends BaseCommand
{
    /**
     * @var Filesystem
     */
    protected $filesystem;
    /**
     * @var DatabaseMigrationRepository
     */
    protected $migrationRepository;
    /**
     * @var Migrator
     */
    protected $migrator;

    public function __construct()
    {
        parent::__construct();
        $this->filesystem = new Filesystem();
        $this->initRepository();
        $this->initMigrator();
    }

    protected function initRepository()
    {
        $this->repository = new DatabaseMigrationRepository($this->capsule->getDatabaseManager(), 'migrations');
        if(!$this->repository->repositoryExists()){
            $this->repository->createRepository();
        }
    }

    protected function initMigrator()
    {
        $this->migrator = new Migrator($this->repository, $this->capsule->getDatabaseManager(), $this->filesystem, $this->capsule->getEventDispatcher());
    }
}