<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Moneda extends Model
{
    protected $table = 'monedas';
    public $timestamps = false;

    public function clientes()
    {
        return $this->belongsToMany(Cliente::class, 'moneda_cliente', 'id_moneda', 'id_cliente')->withPivot('valor');
    }
}
