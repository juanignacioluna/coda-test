<?php namespace Mia\Database\Where;

use \Illuminate\Database\Capsule\Manager as DB;
use \Illuminate\Database\Eloquent\Model;

/**
 * Description of Configure
 *
 * @author matiascamiletti
 */
class DateWhere extends AbstractWhere 
{
    protected $type = AbstractWhere::TYPE_DATE;
    /**
     * List of keys
     *
     * @var array
     */
    protected $key = '';

    public function __construct($data)
    {
        $this->key = $data['key'];
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
        $query->whereRaw('DATE('.$this->cleanKey($this->key).') = DATE(?)', $this->value);
    }
}