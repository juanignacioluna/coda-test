<?php namespace Mia\Database\Where;

use \Illuminate\Database\Capsule\Manager as DB;
use \Illuminate\Database\Eloquent\Model;

/**
 * Description of Configure
 *
 * @author matiascamiletti
 */
class FactoryWhere
{
    /**
     * 
     */
    static $types = [
        AbstractWhere::TYPE_LIKES => LikesWhere::class,
        AbstractWhere::TYPE_DATE => DateWhere::class,
        AbstractWhere::TYPE_WEEK => WeekWhere::class,
        AbstractWhere::TYPE_MONTH => MonthWhere::class,
        AbstractWhere::TYPE_YEAR => YearWhere::class,
        AbstractWhere::TYPE_BETWEEN => BetweenWhere::class,
    ];
    /**
     * Create where
     *
     * @param array $data
     * @return void
     */
    public static function create($data)
    {
        $className = self::$types[$data['type']];
        return new $className($data);
    }
    /**
     * Create all wheres
     *
     * @param array $wheres
     * @return void
     */
    public static function createAll($wheres)
    {
        $items = [];
        foreach($wheres as $where){
            $items[] = self::create($where);
        }
        return $items;
    }
}