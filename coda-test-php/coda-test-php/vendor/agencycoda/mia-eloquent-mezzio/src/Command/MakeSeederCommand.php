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
class MakeSeederCommand extends MakeCommand
{
    /**
     * Path del archivo a tener de base
     * @var string
     */
    protected $filePath = './vendor/agencycoda/mia-eloquent-mezzio/data/seeder.create.txt';
    /**
     * Path de la carpeta donde se va a guardar
     * @var string
     */
    protected $savePath = 'database/seeders/';

    public function __construct($name)
    {
        parent::__construct($name);
    }

    public function run()
    {
        // Open File
        $file = file_get_contents($this->filePath);
        // Procesamos variables
        $file = str_replace('{{ class }}', $this->getCamelCase($this->name), $file);
        $file = str_replace('{{ table }}', $this->name, $file);

        try {
            mkdir($this->savePath, 0777, true);
        } catch (\Exception $exc) { }

        file_put_contents($this->savePath . $this->getCamelCase($this->name) . '.php', $file);
    }

}