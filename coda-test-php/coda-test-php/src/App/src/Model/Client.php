<?php

namespace App\Model;


class Client extends \Illuminate\Database\Eloquent\Model{

    protected $table = 'client';

    protected static function boot(): void
    {
        parent::boot();
        
        static::addGlobalScope('exclude', function (\Illuminate\Database\Eloquent\Builder $builder) {
            $builder->where('client.deleted', 0);
        });
    }
}