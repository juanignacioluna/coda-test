<?php namespace Mia\Database\Command;

use Illuminate\Support\Facades\Schema;
use Mia\Database\Facade\AppMock;

/**
 * Description of BaseCommand
 *
 * @author matiascamiletti
 */
abstract class BaseCommand
{
    /**
     * @var \Illuminate\Database\Capsule\Manager
     */
    protected $capsule;

    public function __construct()
    {
        $this->init();
    }

    protected function init()
    {
        $this->initEloquent();
        $this->initFacade();
    }

    protected function initEloquent()
    {
        $config = include 'config/autoload/eloquent.global.php';
        $this->capsule = new \Illuminate\Database\Capsule\Manager();
        $this->capsule->addConnection($config['eloquent']);
        $this->capsule->setAsGlobal();
        $this->capsule->bootEloquent();
    }

    protected function initFacade()
    {
        $app = new AppMock();
        $app['db'] = $this->capsule;
        Schema::setFacadeApplication($app);
    }

    public function run()
    {

    }
}