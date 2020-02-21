<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Fornecedor extends Model
{
    protected $fillable = [
        'idempresa',
        'nome',
        'tipoempresa',
        'documento',
        'datanascimento',
        'rg',
    ];
    
    public function empresa()
    {
        return $this->hasMany('App\Empresa', 'id');
    }
}
