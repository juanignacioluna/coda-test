<?php namespace Mia\Database\Where;

use \Illuminate\Database\Capsule\Manager as DB;
use \Illuminate\Database\Eloquent\Model;

/**
 * Description of Configure
 *
 * @author matiascamiletti
 */
class LikesWhere extends AbstractWhere 
{
    protected $type = AbstractWhere::TYPE_LIKES;
    /**
     * List of keys
     *
     * @var array
     */
    protected $keys = [];

    public function __construct($data)
    {
        $this->keys = $data['keys'];
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
        $raw = '';
        $values = [];
        // for each all keys
        $isFirst = true;
        foreach($this->keys as $key){
            if(!$isFirst){
                $raw .= ' OR ';
            }
            $raw .= $key . ' REGEXP ?';

            $values[] = $this->value;
            $isFirst = false;
        }
        //$values = $search . '|' . implode('|', explode(' ', $search));
        $query->whereRaw('('.$raw.')', $values);
    }
}