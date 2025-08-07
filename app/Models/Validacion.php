<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Validacion extends Model
{
    protected $table = 'validaciones';

    protected $fillable = [
        'validador',
        'codigo_tienda',
        'pallet',
        'bultos',
        'cantidad',
        'fecha',
        'tipo_sf',
        'codigo_producto',
        'usuario_picker',
        'turno',
        'nombre_picker',
        'tiempo_validacion',
    ];

}
