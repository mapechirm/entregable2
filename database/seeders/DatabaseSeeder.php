<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Platform;
use App\Models\User;
use App\Models\Videogame;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::factory(10)->create();
        Category::factory(6) -> create();
        Platform::factory(5) -> create();
        Videogame::factory(20) -> create();

        foreach (Videogame::all() as $videogame) {
            $platforms = Platform::inRandomOrder() -> take(rand(1,3)) -> pluck('id');
            $videogame -> platforms() -> attach($platforms);
        }
    }
}
