<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ProductosFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'codigo_descripcion'=>$this->faker->text(20),
            'descripcion'=>$this->faker->text(20),
            'especificacion'=>$this->faker->text(20),
            'presentacion'=>$this->faker->text(20),
            'precio_1'=>$this->faker->text(20),
            'precio_2'=>$this->faker->text(20),
            'precio_3'=>$this->faker->text(20),
            'proveedores_id'=>(1),
            'categorias_id'=>(1),
        ];
    }
}
