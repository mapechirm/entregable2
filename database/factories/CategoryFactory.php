<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class CategoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $clasificaciones = ['Terror', 'Aventura', 'Ficción', 'Mundo Abierto', 'Deportes', 'Simulacion'];
        $clasificacion = $this -> faker -> unique() -> randomElement($clasificaciones);

        return [
            'nombre' => $clasificacion,
            'slug' => str_replace(' ', '-', $clasificacion)
        ];
    }
}
