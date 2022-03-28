<?php namespace Mia\Database\Query;

use \Illuminate\Database\Capsule\Manager as DB;
use \Illuminate\Database\Eloquent\Model;
use Mia\Database\Where\AbstractWhere;
use Mia\Database\Where\FactoryWhere;
use Mia\Database\Where\RawWhere;

/**
 * Description of Configure
 *
 * @author matiascamiletti
 */
class Configure 
{
    /**
     * Almacena el orden de los registros
     * @var array
     */
    protected $order = array();
    /**
     * Almacena el numero de pagina a obtener
     * @var int
     */
    protected $page = 1;
    /**
     * Almacena todos los selects de la query
     * @var array
     */
    protected $selects = array();
    /**
     * Almacena todos los wheres de la query
     * @var array
     */
    protected $where = array();
    /**
     * Almacena todos los wheres de la query V2
     * Abstract Where
     * @var array
     */
    protected $wheres = array();
    /**
     * Almacena todos los joins de la query
     * @var array
     */
    protected $joins = array();
    /**
     * Almacena todos los joins de la query
     * @var array
     */
    protected $leftJoins = array();
    /**
     * Almacena todos los joins de la query
     * @var array
     */
    protected $rightJoins = array();
    /**
     * Almacena las relaciones
     * @var array
     */
    protected $withs = array();
    /**
     * Almacena el campo de busqueda
     * @var string
     */
    protected $search = '';
    /**
     * Almacena el numero de registros a obtener
     * @var int
     */
    protected $limit = 50;
    /**
     * Desactivar orden para manejarlo manualmente
     * @var boolean
     */
    public $deactivateOrder = false;
    
    /**
     * Constructor que permite enviar Handler y Request para obtener los parametros
     * @param \Mia\Core\Request\MiaRequestHandler $handler
     * @param \Psr\Http\Message\ServerRequestInterface $request
     */
    public function __construct(
            \Mia\Core\Request\MiaRequestHandler $handler = null, 
            \Psr\Http\Message\ServerRequestInterface $request = null)
    {
        // Procesamos los parametros enviados en la petición
        if($handler != null && $request != null){
            $this->processParams($handler, $request);
        }
    }
    /**
     * Configura la query con los datos configurados
     * @param Model $query
     */
    public function run($query)
    {
        // Configuramos los Selects
        foreach($this->selects as $select){
            $query->selectRaw($select);
        }

        // Configuramos los Joins
        foreach($this->joins as $join){
            $query->join($join['table'], $join['column_table'], '=', $join['column_relation']);
        }
        foreach($this->leftJoins as $join){
            $query->leftJoin($join['table'], $join['column_table'], '=', $join['column_relation']);
        }
        foreach($this->rightJoins as $join){
            $query->rightJoin($join['table'], $join['column_table'], '=', $join['column_relation']);
        }

        // Configuramos los Wheres
        foreach($this->where as $where){
            if(array_key_exists('date', $where)){
                $query->whereRaw('DATE('.$where['key'].') = DATE(\'' . $where['value'] . '\')');
            }else if(array_key_exists('month', $where)){
                $query->whereRaw('MONTH('.$where['key'].') = ' . $where['value']);
            }else if(array_key_exists('year', $where)){
                $query->whereRaw('YEAR('.$where['key'].') = ' . $where['value']);
            }else if(array_key_exists('in', $where)){
                $query->whereIn($where['key'], $where['value']);
            }else if(array_key_exists('notin', $where)){
                $query->whereNotIn($where['key'], $where['value']);
            }else if(array_key_exists('like', $where)){
                $query->where($where['key'], 'like', '%'.$where['value'].'%');
            }else if(array_key_exists('between', $where)){
                $query->whereBetween($where['key'], [$where['from'], $where['to']]);
            }else{
                $query->where($where['key'], '=', $where['value']);
            }
        }
        // Configuramos los Wheres V2
        foreach($this->wheres as $where){
            $where->run($query);
        }

        // Configuramos orden
        if($this->hasOrder() && $this->order[0]['column'] == 'nearby'){
            $query->addSelect(DB::raw("6371 * acos(cos(radians(" . $this->order[0]['latitude'] . ")) * cos(radians(latitude)) * cos(radians(longitude) - radians(" . $this->order[0]['longitude'] . ")) + sin(radians(" .$this->order[0]['latitude']. ")) * sin(radians(latitude))) AS distance"));
            $query->orderBy('distance', $this->order[0]['direction']);
        }else if($this->hasOrder() && !$this->deactivateOrder){
            $query->orderBy($this->order[0]['column'], $this->order[0]['direction']);
        }
        // Configuramos Relaciones
        $query->with($this->withs);
    }
    /**
     * 
     */
    public function addWith($key)
    {
        $this->withs[] = $key;
    }
    /**
     * 
     *
     * @param string $key
     * @return boolean
     */
    public function isExistWith($key)
    {
        foreach($this->withs as $with){
            if($with == $key){
                return true;
            }
        }

        return false;
    }
    /**
     *
     * @param string $key
     * @return void
     */
    public function removeWith($key)
    {
        $index = 0;
        foreach($this->withs as $with){
            if($with == $key){
                break;
            }
            $index++;
        }

        unset($this->withs[$index]);
    }
    /**
     * Agregar un select a la query
     * @param string $select
     */
    public function addSelectRaw($select)
    {
        $this->selects[] = $select;
    }
    /**
     * Agregar un join a la query
     * @param string $key
     * @param mixed $value
     */
    public function addJoin($table, $tableColumn, $tableRelation)
    {
        $this->joins[] = array('table' => $table, 'column_table' => $tableColumn, 'column_relation' => $tableRelation);
    }
    /**
     * Agregar un join a la query
     * @param string $key
     * @param mixed $value
     */
    public function addLeftJoin($table, $tableColumn, $tableRelation)
    {
        $this->leftJoins[] = array('table' => $table, 'column_table' => $tableColumn, 'column_relation' => $tableRelation);
    }
    /**
     * Agregar un join a la query
     * @param string $key
     * @param mixed $value
     */
    public function addRightJoin($table, $tableColumn, $tableRelation)
    {
        $this->rightJoins[] = array('table' => $table, 'column_table' => $tableColumn, 'column_relation' => $tableRelation);
    }
    /**
     * Agregar un where a la query
     * @param string $key
     * @param mixed $value
     */
    public function addWhere($key, $value)
    {
        $this->where[] = array('key' => $key, 'value' => $value);
    }
    /**
     * Agregar un whereIn a la query
     * @param string $key
     * @param array $value
     */
    public function addWhereIn($key, $value)
    {
        $this->where[] = array('key' => $key, 'value' => $value, 'in' => true);
    }
    /**
     * Agregar un whereIn a la query
     * @param string $key
     * @param array $value
     */
    public function addWhereNotIn($key, $value)
    {
        $this->where[] = array('key' => $key, 'value' => $value, 'notin' => true);
    }
    /**
     * Agregar un whereIn a la query
     * @param string $key
     * @param array $value
     */
    public function addWhereBetween($key, $from, $to)
    {
        $this->where[] = array('key' => $key, 'from' => $from, 'to' => $to, 'between' => true);
    }
    /**
     * Add whereRaw with keys
     *
     * @param array $keys
     * @param mixed $value
     * @return void
     */
    public function addWhereLikes($keys, $value)
    {
        $this->wheres[] = FactoryWhere::create(array(
            'type' => AbstractWhere::TYPE_LIKES,
            'keys' => $keys,
            'value' => $value
        ));
    }
    /**
     * Add whereRaw with keys
     *
     * @param string $key
     * @param string $value
     * @return void
     */
    public function addWhereDate($key, $value)
    {
        $this->wheres[] = FactoryWhere::create(array(
            'type' => AbstractWhere::TYPE_DATE,
            'key' => $key,
            'value' => $value
        ));
    }
    /**
     * Add whereRaw with keys
     *
     * @param string $query
     * @param array $value
     * @return void
     */
    public function addWhereRaw($query, $value = [])
    {
        $this->wheres[] = new RawWhere(array(
            'type' => AbstractWhere::TYPE_RAW,
            'query' => $query,
            'value' => $value
        ));
    }
    /**
     * Elimina un where del listado
     * @param string $key
     */
    public function removeWhere($key)
    {
        for ($i = 0; $i < count($this->where); $i++) {
            
            if(!isset($this->where[$i])){
                continue;
            }
            
            if($this->where[$i]['key'] != $key){
                continue;
            }
            
            unset($this->where[$i]);
            break;
        }
    }
    /**
     * Determina si la configuración tiene un orden para la Query
     * @return boolean
     */
    public function hasOrder()
    {
        if(count($this->order) > 0){
            return true;
        }
        return false;
    }
    /**
     * 
     */
    public function cleanOrder()
    {
        $this->order = [];
    }
    /**
     * 
     */
    public function cleanWiths()
    {
        $this->withs = [];
    }
    /**
     * Obtiene numero de pagina
     * @return int
     */
    public function getPage()
    {
        return $this->page;
    }
    /**
     * Obtiene el campo de busqueda
     * @return string
     */
    public function getSearch()
    {
        return $this->search;
    }
    /**
     * Obtiene el limite
     * @return int
     */
    public function getLimit()
    {
        return $this->limit;
    }
    /**
     * 
     * @return array
     */
    public function getOrders()
    {
        return $this->order;
    }
    /**
     * 
     * @return array
     */
    public function getJoins()
    {
        return $this->joins;
    }
    /**
     * 
     * @param string $key
     * @return arary|null
     */
    public function getWhere($key)
    {
        for ($i = 0; $i < count($this->where); $i++) {
            if(!isset($this->where[$i])){
                continue;
            }
            
            if($this->where[$i]['key'] == $key){
                return $this->where[$i];
            }
        }
        
        return null;
    }
    /**
     * 
     * @return array
     */
    public function getWheres()
    {
        return $this->where;
    }
    /**
     * Procesa los parametros enviados en la petición para incluirlos en la query
     * @param \Mobileia\Expressive\Request\MiaRequestHandler $handler
     * @param \Psr\Http\Message\ServerRequestInterface $request
     */
    protected function processParams(
            \Mia\Core\Request\MiaRequestHandler $handler = null, 
            \Psr\Http\Message\ServerRequestInterface $request = null)
    {
        // Procesar orden de la Query
        $ord = $handler->getParam($request, 'ord', '');
        $asc = $handler->getParam($request, 'asc', 1);
        if($ord != '' && $ord == 'nearby'){
            $latitude = $handler->getParam($request, 'latitude', 0);
            $longitude = $handler->getParam($request, 'longitude', 0);
            $this->order[] = array('column' => 'nearby', 'direction' => $asc == 0 ? 'asc' : 'desc', 'latitude' => $latitude, 'longitude' => $longitude);
        }else if($ord != ''){
            $this->order[] = array('column' => $ord, 'direction' => $asc == 0 ? 'asc' : 'desc');
        }
        // Procesar numero de pagina
        $this->page = $handler->getParam($request, 'page', 1);
        // Procesar Joins
        $this->processJoins($handler->getParam($request, 'joins', []));
        // Procesar Wheres
        $this->processWhere($handler->getParam($request, 'where', ''));
        $this->wheres = FactoryWhere::createAll($handler->getParam($request, 'wheres', []));
        // Procesar campo de busqueda
        $this->search = $handler->getParam($request, 'search', '');
        // Procesar campo limite
        $this->limit = $handler->getParam($request, 'limit', 50);
        // Procesar relaciones
        $this->withs = $handler->getParam($request, 'withs', []);
    }
    /**
     * Procesa los joins enviados en la petición
     * @param array $where
     * @return boolean
     */
    protected function processJoins($data)
    {
        if($data == null){
            return false;
        }

        foreach($data as $join){
            if(!array_key_exists('table', $join)){
                continue;
            }

            $this->addJoin($join['table'], $join['column'], $join['relation']);
        }

        return true;
    }
    /**
     * Procesa los wheres enviados en la petición
     * @param string $where
     * @return boolean
     */
    protected function processWhere($where = '')
    {
        if($where == ''){
            return false;
        }
        $data = explode(';', $where);
        foreach($data as $w){
            $d = explode(':', $w);
            $count = count($d);
            if($count <= 1){
                continue;
            }else if($count == 3 && $d[1] == 'in'){
                $this->where[] = array('key' => $d[0], $d[1] => true, 'value' => explode(',', $d[2]));
            }else if($count == 3 && $d[1] == 'notin'){
                $this->where[] = array('key' => $d[0], $d[1] => true, 'value' => explode(',', $d[2]));
            }else if($count == 3 && $d[1] == 'like'){
                $this->where[] = array('key' => $d[0], $d[1] => true, 'value' => $d[2]);
            }else if($count == 3 && $d[1] == 'date'){
                $this->where[] = array('key' => $d[0], $d[1] => true, 'value' => $d[2]);
            }else if($count == 3 && $d[1] == 'month'){
                $this->where[] = array('key' => $d[0], $d[1] => true, 'value' => $d[2]);
            }else if($count == 3 && $d[1] == 'year'){
                $this->where[] = array('key' => $d[0], $d[1] => true, 'value' => $d[2]);
            }else if($count == 4 && $d[1] == 'between'){
                $this->where[] = array('key' => $d[0], $d[1] => true, 'from' => $d[2], 'to' => $d[3]);
            }else if($count == 3){
                $this->where[] = array('key' => $d[0], $d[1] => true, 'value' => $d[2]);
            }else{
                $this->where[] = array('key' => $d[0], 'value' => $d[1]);
            }
        }
        return true;
    }
}