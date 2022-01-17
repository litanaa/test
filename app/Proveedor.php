<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Proveedor extends Model
{
    public $guarded = [];
    protected $table = 'proveedores';
    public $timestamps = false;

    public function clientes()
    {
        return $this->belongsToMany(Cliente::class, 'proveedor_cliente', 'id_proveedor', 'id_cliente');
    }
}
