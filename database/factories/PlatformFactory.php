<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class PlatformFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $platform = ['PlayStation 5', 'Xbox', 'PC', 'Mobil', 'Switch'];
        $abreviaciones = ['PS', 'Xb', 'Pc', 'Mb', 'Sw'];
        $rand_num = array_search(($this -> faker -> unique() -> randomElement($platform)), $platform);

        return [
            'nombre' => $platform[$rand_num],
            'slug' => $abreviaciones[$rand_num]
        ];
    }
}
