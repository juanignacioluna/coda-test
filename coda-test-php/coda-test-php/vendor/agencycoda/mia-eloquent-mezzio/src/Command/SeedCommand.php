<?php namespace Mia\Database\Command;

/**
 * Description of BaseCommand
 *
 * @author matiascamiletti
 */
class SeedCommand extends BaseMigrationCommand
{
    protected $folders = [
        'vendor/agencycoda/mia-auth-mezzio/database/seeders/*.php',
        'database/seeders/*.php',
    ];

    protected function processFile($file)
    {
        require_once $file;
        // get the file name of the current file without the extension
        // which is essentially the class name
        $class = basename($file, '.php');
        
        if (class_exists($class)) {
            $obj = new $class;
            $obj->run();
        }
    }

    public function run()
    {
        foreach($this->folders as $folder) {
            foreach (glob($folder) as $file){
                $this->processFile($file);
            }
        }
    }
}