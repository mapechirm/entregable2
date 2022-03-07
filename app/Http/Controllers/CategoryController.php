<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Videogame;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index () {
        return view('categorias.categorias', [
            "categorias" => Category::all()
        ]);
    }

    public function show (Category $categoria) {
        return view('categorias.verCategoria', [
            'videogames' => Videogame::where('category_id', $categoria -> id) -> get()
        ]);
    }

    public function create() {
        
    }

    public function destroy () {

    }
}
