<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    public $timestamps = false;

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function videogames () {
        return $this -> hasMany(Videogame::class);
    }
}

?>
