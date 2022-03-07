<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\PlatformController;
use App\Http\Controllers\VideogameController;
use App\Models\User;
use App\Models\Videogame;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::middleware('guest')->group(function () {
    Route::get('/', [AuthenticatedSessionController::class, 'create'])
                ->name('login');

    Route::post('/', [AuthenticatedSessionController::class, 'store']);
});

Route::middleware('auth')->group(function () {
    Route::post('logout', [AuthenticatedSessionController::class, 'destroy']) -> name('logout');

    Route::get('/register', function () {
        Gate::authorize('create-videogame');
        return view('registroUsuarios');
    }) -> name('registro.get');

    Route::post('/register', function (Request $request) {
        try {
            Gate::authorize('create-videogame');
            $pass = $request -> get('pass');
            $confpass = $request -> get('confpass');
            if ($pass !== $confpass) {
                return back() -> with('danger', 'Las contraseñas ingresadas no coinciden.');
            }
            $user = new User();
            $user -> email = $request -> get('user');
            $user -> password = bcrypt($pass);
            $user -> perfil = $request -> get('perfil');
            
            if ($user -> save()) {
                return back() -> with('success', "El usuario fue registrado correctamente.");
            } 
        } catch (Exception $ex) {
            return back() -> with('danger', "El usuario no pudo ser registrado correctamente.");
        }

    }) -> name('registro.set');

    Route::patch('videojuegos/{videojuego}/restore', [VideogameController::class, 'restore']) -> name('videojuegos.restore');

    Route::delete('videojuegos/{videojuego}/forceDelete', [VideogameController::class, 'forceDelete']) -> name('videojuegos.forceDelete');

    Route::resource('videojuegos', VideogameController::class) -> except(['edit']);

    Route::resource('categorias', CategoryController::class) -> only(['index', 'show']);

    Route::resource('plataformas', PlatformController::class) -> only(['index', 'show']);
});
