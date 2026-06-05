<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Repair extends Model
{
    use HasFactory;
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
    public function audits() {   
        return $this->hasMany(RepairAudit::class);
    }

    protected static function booted() {
        static::updated(function ($repair) {
            $changes = $repair->getChanges(); // sólo los atributos modificados
            if (!empty($changes)) {
                RepairAudit::create([
                    'repair_id' => $repair->id,
                    'user_id'   => auth()->id(),
                    'changes'   => $changes,
                ]);
            }
        });
    }
}
        

