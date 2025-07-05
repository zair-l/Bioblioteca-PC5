<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Libro;

class LibroController extends Controller
{
    public function catalogoUsuario()
    {
        $libros = Libro::all();
        return view('Libros.catalogo-usuario', compact('libros'));
    }

    public function listar()
    {
        $libros = DB::select("SELECT * FROM libros");
        return view('libros.listar', compact('libros'));
    }

    public function crear()
    {
        return view('libros.crear');
    }

    public function almacenar(Request $request)
    {
        $request->validate([
            'titulo' => 'required|string|max:255',
            'autor' => 'required|string|max:255',
            'categoria' => 'required|string|max:100',
            'stock' => 'required|integer|min:0'
        ]);

        DB::statement("BEGIN crear_libro(:titulo, :autor, :categoria, :stock); END;", [
            'titulo' => $request->titulo,
            'autor' => $request->autor,
            'categoria' => $request->categoria,
            'stock' => $request->stock,
        ]);

        return redirect()->route('libros.listar')->with('exito', 'Libro registrado correctamente');
    }

    public function editar($id)
    {
        $libro = DB::selectOne("SELECT * FROM libros WHERE id = :id", ['id' => $id]);
        return view('libros.editar', compact('libro'));
    }

    public function actualizar(Request $request, $id)
    {
        $request->validate([
            'titulo' => 'required',
            'autor' => 'required',
            'categoria' => 'required',
            'stock' => 'required|integer',
        ]);

        DB::statement("BEGIN actualizar_libro(:id, :titulo, :autor, :categoria, :stock); END;", [
            'id' => $id,
            'titulo' => $request->titulo,
            'autor' => $request->autor,
            'categoria' => $request->categoria,
            'stock' => $request->stock,
        ]);

        return redirect()->route('libros.listar')->with('exito', 'Libro actualizado correctamente');
    }

    public function eliminar($id)
    {
        DB::statement("BEGIN eliminar_libro(:id); END;", ['id' => $id]);
        return redirect()->route('libros.listar')->with('exito', 'Libro eliminado correctamente');
    }
}
