<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Videogame extends Model
{
    use HasFactory;
    use SoftDeletes;

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function category () {
        return $this-> belongsTo(Category::class);
    }

    public function platforms () {
        return $this -> belongsToMany(Platform::class);
    }

    public function image () {
        return $this -> hasOne(Image::class);
    }
}
