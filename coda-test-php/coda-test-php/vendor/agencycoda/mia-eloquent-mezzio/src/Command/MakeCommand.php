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
class MakeCommand extends BaseMigrationCommand
{
    /**
     * @var string
     */
    protected $name = '';
    /**
     * Path del archivo a tener de base
     * @var string
     */
    protected $filePath = './vendor/agencycoda/mia-eloquent-mezzio/data/migration.create.txt';
    /**
     * Path de la carpeta donde se va a guardar
     * @var string
     */
    protected $savePath = 'database/migrations/';

    public function __construct($name)
    {
        parent::__construct();
        $this->name = $name;
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

        $now = new \DateTime();
        $dateName = $now->format('Y_m_d') . '_' . $now->format('H') . $now->format('i') . $now->format('s');

        file_put_contents($this->savePath . $dateName . '_' . $this->name . '.php', $file);
    }

    /**
     * Convierte el texto en camelcase
     * 
     * Ej: blog_tag => BlogTag
     * Ej: blog-tag => BlogTag
     *
     * @param string $text
     * @return string
     */
    protected function getCamelCase($text)
    {
        return str_replace(' ', '', ucwords(str_replace(['_', '-'], [' ', ' '], $text)));
    }
    /**
     * Convierte el texto en camelcase
     * 
     * Ej: blog_tag => blogTag
     * Ej: blog-tag => blogTag
     *
     * @param string $text
     * @return string
     */
    protected function getCamelCaseVar($text)
    {
        return str_replace(' ', '', 
                lcfirst(ucwords(str_replace(['_', '-'], [' ', ' '], $text)))
        );
    }
}