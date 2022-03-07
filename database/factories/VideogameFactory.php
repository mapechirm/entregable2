<?php

namespace Database\Factories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class VideogameFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $nombre = Str::random(12);
        $precioAdq = $this -> faker -> randomFloat(2, 1, 6000);

        return [
            'nombre' => $nombre,
            'slug' => strtolower(str_replace(' ', '-', $nombre)),
            'precioAdq' => $precioAdq,
            'precioVent' => $precioAdq * 1.4,
            'category_id' => $this -> faker -> numberBetween(1,6)
        ];
    }
}
