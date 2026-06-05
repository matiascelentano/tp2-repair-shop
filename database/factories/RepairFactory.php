<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Repair;

class RepairFactory extends Factory
{
    protected $model = Repair::class;

    public function definition()
    {
        $marcas = ['Apple','Samsung','Xiaomi','Huawei','Motorola','Nokia','LG','Sony','OnePlus'];
        $estados = ['Ingresado','En reparación','Reparado','Entregado'];

        return [
            'nombre_cliente' => $this->faker->name(),
            'marca_celular' => $this->faker->randomElement($marcas),
            'modelo_celular' => $this->faker->bothify('Model-##??'),
            'descripcion_falla' => $this->faker->sentence(),
            'fecha_ingreso' => $this->faker->date(),
            'estado' => $this->faker->randomElement($estados),
        ];
    }
}
