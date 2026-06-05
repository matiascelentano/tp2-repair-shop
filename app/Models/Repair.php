<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Repair extends Model
{
    protected $fillable = [
        'nombre_cliente',
        'marca_celular',
        'modelo_celular',
        'descripcion_falla',
        'fecha_ingreso',
        'estado',
    ];

    const ESTADOS = [
        'Ingresado',
        'En reparación',
        'Reparado',
        'Entregado',
    ];
    
    protected $casts = [
        'fecha_ingreso' => 'date',
    ];
};
        

