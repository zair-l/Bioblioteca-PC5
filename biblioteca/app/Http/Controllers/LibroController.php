<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LibroController extends Controller
{
    /**
     * Listar libros
     */
    public function listar() {
        $usuarioActual = session('usuario_actual');

        if (!$usuarioActual) {
            return redirect()->route('iniciar-sesion')->with('error', 'Debes iniciar sesión para acceder');
        }

        if ($usuarioActual->rol === 'bibliotecario') {
            $libros = DB::select("SELECT * FROM libros");
            return view('libros.listar', compact('libros'));
        } else {
            $librosDisponibles = DB::select("SELECT * FROM libros WHERE stock > 0");
            return view('libros.catalogo-usuario', compact('librosDisponibles'));
        }
    }

    /**
     * Mostrar formulario de creación de libro
     */
    public function crear() {
        $usuarioActual = session('usuario_actual');

        if (!$usuarioActual || $usuarioActual->rol !== 'bibliotecario') {
            return redirect()->route('inicio')->with('error', 'No tienes permisos suficientes');
        }

        return view('libros.crear');
    }

    /**
     * Guardar un nuevo libro en la base de datos
     */
    public function almacenar(Request $request) {
        $usuarioActual = session('usuario_actual');

        if (!$usuarioActual || $usuarioActual->rol !== 'bibliotecario') {
            return redirect()->route('inicio')->with('error', 'No tienes permisos suficientes');
        }

        $request->validate([
            'titulo' => 'required|string|max:255',
            'autor' => 'required|string|max:255',
            'categoria' => 'required|string|max:100',
            'stock' => 'required|integer|min:0'
        ]);

        try {
            // Llamada a procedimiento almacenado en Oracle
            DB::statement("BEGIN crear_libro(:titulo, :autor, :categoria, :stock); END;", [
                'titulo' => $request->titulo,
                'autor' => $request->autor,
                'categoria' => $request->categoria,
                'stock' => $request->stock
            ]);

            return redirect()->route('libros.listar')->with('exito', 'Libro registrado correctamente');
        } catch (\Exception $e) {
            return back()->with('error', 'Error al registrar el libro: ' . $e->getMessage());
        }
    }
}
