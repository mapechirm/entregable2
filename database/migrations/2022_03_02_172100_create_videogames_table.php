<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVideogamesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('videogames', function (Blueprint $table) {
            $table -> id();
            $table -> foreignId('category_id') -> constrained('categories');
            $table -> string('nombre', 30) -> unique();
            $table -> string('slug', 30) -> unique();
            $table -> string('image') -> nullable();
            $table -> float('precioAdq');
            $table -> float('precioVent');
            $table -> softDeletes();
            $table -> timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('videogames');
    }
}
