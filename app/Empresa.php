<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Empresa extends Model
{
    protected $fillable = [
        'id',
        'uf',
        'nomefantasia',
        'cnpj',
    ];

    public function fornecedor()
    {
        return $this->belongsTo('App\Empresa', 'id');
    }

    public function estado()
    {
        return $this->belongsTo('App\Estado', 'uf');
    }
}
