<?php namespace Mia\Database\Where;

use \Illuminate\Database\Capsule\Manager as DB;
use \Illuminate\Database\Eloquent\Model;

/**
 * Description of Configure
 *
 * @author matiascamiletti
 */
class BetweenWhere extends AbstractWhere 
{
    protected $type = AbstractWhere::TYPE_BETWEEN;
    /**
     * Key
     *
     * @var array
     */
    protected $key = '';
    protected $from = '';
    protected $to = '';

    public function __construct($data)
    {
        $this->key = $data['key'];
        $this->from = $data['from'];
        $this->to = $data['to'];
    }
    /**
     * 
     *
     * @param Model $query
     * @return void
     */
    public function run($query)
    {
        $query->whereBetween($this->key, [$this->from, $this->to]);
    }
}