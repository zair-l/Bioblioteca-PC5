<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LibroController;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\AutenticacionController;

// Ruta principal redirige al login
Route::get('/', [AutenticacionController::class, 'iniciarSesion'])->name('iniciar-sesion');

// Rutas de autenticación
Route::post('/autenticar', [AutenticacionController::class, 'autenticar'])->name('autenticar');
Route::post('/cerrar-sesion', [AutenticacionController::class, 'cerrarSesion'])->name('cerrar-sesion');

// Catálogo para usuarios
Route::get('/catalogo', [LibroController::class, 'catalogoUsuario'])->name('libros.catalogo-usuario');

// Registro de usuarios 
Route::get('/usuarios/crear', [UsuarioController::class, 'crear'])->name('usuarios.crear');
Route::post('/usuarios', [UsuarioController::class, 'almacenar'])->name('usuarios.almacenar');

// Rutas protegidas
Route::get('/inicio', [AutenticacionController::class, 'inicio'])->name('inicio');
Route::get('/libros', [LibroController::class, 'listar'])->name('libros.listar');
Route::get('/libros/crear', [LibroController::class, 'crear'])->name('libros.crear');
Route::post('/libros', [LibroController::class, 'almacenar'])->name('libros.almacenar');


Route::get('/libros/{id}/editar', [LibroController::class, 'editar'])->name('libros.editar');

// Guardar cambios del libro editado
Route::post('/libros/{id}', [LibroController::class, 'actualizar'])->name('libros.actualizar');

// Eliminar libro
Route::post('/libros/{id}/eliminar', [LibroController::class, 'eliminar'])->name('libros.eliminar');

Route::get('/libros/{id}/editar', [LibroController::class, 'editar'])->name('libros.editar');
Route::put('/libros/{id}', [LibroController::class, 'actualizar'])->name('libros.actualizar');
