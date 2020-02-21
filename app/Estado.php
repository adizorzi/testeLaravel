<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Estado extends Model
{
    protected $fillable = [
        'descricao',
        'prefixo'
    ];

    public function empresa()
    {
        return $this->hasMany('App\Estado', 'id');
    }
}
