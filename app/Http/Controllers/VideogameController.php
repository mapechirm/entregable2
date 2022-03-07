<?php

namespace App\Http\Controllers;

use App\Mail\MailManager;
use App\Models\Category;
use App\Models\Platform;
use App\Models\Videogame;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;
use App\Events\ImageSet;
use App\Http\Requests\CreateVideogameRequest;

class VideogameController extends Controller
{
    public function index()
    {
        return view('videogames.consultaVideojuegos', [
            "videojuegos" => Videogame::orderBy('nombre') -> with('category') -> get(),
            'deletedVideogames' => Videogame::onlyTrashed() -> with('category') -> get(),
            'categories' => Category::all(),
            'platforms' => Platform::all()
        ]);
    }

    public function create()
    {
        $this -> authorize('create-videogame');
        return view('videogames.registroVideojuegos', ['categories' => Category::all(), 'platforms' => Platform::all()]);
    }

    public function store(CreateVideogameRequest $request)
    {
        try {
            $videogame = new Videogame();
            $name = $request -> get('name');
            $precioAdq = $request -> get('precio');
            $videogame -> nombre = $name;
            $videogame -> slug = strtolower(str_replace(' ', '-', $name));
            $videogame -> category_id = $request -> get('category');
            $videogame -> precioAdq = $precioAdq;
            $videogame -> precioVent = $precioAdq * 1.4;
            $videogame -> image = $request -> file('imagen') -> store('images', 'public');
            
            if ($videogame -> save()) {
                ImageSet::dispatch($videogame);
                $videogame -> platforms() -> attach([1,2]); // Modificar
                Mail::to('120035649@upq.edu.mx') -> send(new MailManager($videogame));
                return back() -> with('success', "El videojuego fue registrado correctamente.");
            }
            return back() -> with('danger', "El videojuego no pudo ser registrado correctamente.");
        } catch (Exception $ex) {
            return back() -> with('danger', "El videojuego no pudo ser registrado correctamente.");
        }  
    }

    public function show(Videogame $videojuego)
    {
        return view('videogames.verVideojuego', ["videogame" => $videojuego]);
    }

    public function update(Request $request, Videogame $videojuego)
    {
        try {
            $this -> authorize('create-videogame');
            $request -> validate([
                "nombre" => [
                    'required',
                    'min:3',
                    Rule::unique('videogames') -> ignore($videojuego -> id)
                ],
                'precio' => 'required|numeric',
                'imagen' => 'nullable|mimes:jpeg,jpg,png',
                'category' => 'exists:categories, id'
            ], [
                "nombre.required" => "Por favor ingrese el nombre del videojuego",
                "nombre.min" => "Por favor agregue un nombre válido con minimo 3 letras",
                "nombre.unique" => "El videojuego ingresado ya se encuentra registrado, intente con otro nombre",
                "precio.required" => "Por favor ingrese el precio de adquisición del videojuego",
                "precio.numeric" => "Por favor añada un valor numérico en este campo",
                "imagen.required" => "Por favor agregue una imagen del videojuego",
                "imagen.mimes" => "Ingrese una imagen con un formato valido: jpeg, jpg o png",
                'category.exists' => 'La categoria es invalida'
            ]);

            $name = $request -> get('nombre');
            $precioAdq = $request -> get('precio');
            $videojuego -> nombre = $name;
            $videojuego -> slug = strtolower(str_replace(' ', '-', $name));
            $videojuego -> category_id = $request -> get('category');
            $videojuego -> precioAdq = $precioAdq;
            $videojuego -> precioVent = $precioAdq * 1.4;
            if ($request -> file('imagen') !== null) {
                Storage::delete("public/" . $videojuego -> image);
                $videojuego -> image = $request -> file('imagen') -> store('images', 'public');
            }

            if ($videojuego -> save()) {
                ImageSet::dispatch($videojuego);
                $videojuego -> platforms() -> attach([1,2]);
                return back() -> with('success', "El videojuego fue actualizado correctamente.");
            }
        } catch (Exception $ex) {
            return back() -> with('danger', "El videojuego no pudo ser actualizado correctamente.");
        } 
    }

    public function destroy(Videogame $videojuego)
    {
        try {
            $this -> authorize('create-videogame');
            $videojuego -> delete();
            return back() -> with('success', "El videojuego fue eliminado correctamente.");
        }
        catch (Exception $ex) {
            return back() -> with('danger', "El videojuego no pudo ser eliminado correctamente." . $ex);
        }
    }
    
    public function restore ($videojuego) {
        $this -> authorize('create-videogame');

        $videojuego = Videogame::withTrashed() -> where('slug', $videojuego) -> firstOrFail();

        $videojuego -> restore();
        return back() -> with('success', "El videojuego fue restablecido con éxito.");
    }
    
    public function forceDelete($videojuego) {
        $this -> authorize('create-videogame');

        $videojuego = Videogame::withTrashed() -> where('slug', $videojuego) -> firstOrFail();
        Storage::delete("public/" . $videojuego -> image);

        $videojuego -> forceDelete();
        return back() -> with('success', "El videojuego fue eliminado permanentemente con éxito.");
    }
}
