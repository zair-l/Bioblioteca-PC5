<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsuarioController extends Controller
{
    public function crear() {
        return view('usuarios.crear');
    }

    public function almacenar(Request $request) {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'correo' => 'required|email|unique:usuarios,correo',
            'contrasena' => 'required|min:6',
            'rol' => 'required|in:bibliotecario,usuario'
        ]);

        try {
            DB::statement("BEGIN crear_usuario(:nombre, :correo, :password, :rol); END;", [
                'nombre' => $request->nombre,
                'correo' => $request->correo,
                'password' => Hash::make($request->contrasena),
                'rol' => $request->rol
            ]);

            return redirect()->route('iniciar-sesion')->with('exito', 'Usuario registrado correctamente');
        } catch (\Exception $e) {
            return back()->with('error', 'Error al registrar usuario: ' . $e->getMessage());
        }
    }
}

