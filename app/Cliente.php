<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{

    public $guarded = [];
    protected $table = 'clientes';
    public $timestamps = false;

    public function proveedores()
    {
        return $this->belongsToMany(Proveedor::class, 'proveedor_cliente', 'id_cliente', 'id_proveedor');
    }

    public function monedas()
    {
        return $this->belongsToMany(Moneda::class, 'moneda_cliente', 'id_cliente', 'id_moneda')->withPivot('valor');
    }
}
