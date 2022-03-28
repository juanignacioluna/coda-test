<?php namespace Mia\Database\Where;

use \Illuminate\Database\Capsule\Manager as DB;
use \Illuminate\Database\Eloquent\Model;

/**
 * Description of Configure
 *
 * @author matiascamiletti
 */
class RawWhere extends AbstractWhere 
{
    protected $type = AbstractWhere::TYPE_YEAR;
    /**
     * List of keys
     *
     * @var array
     */
    protected $query = '';

    public function __construct($data)
    {
        $this->query = $data['query'];
        $this->value = $data['value'];
    }
    /**
     * 
     *
     * @param Model $query
     * @return void
     */
    public function run($query)
    {
        $query->whereRaw($this->query, $this->value);
    }
}