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

// Registro de usuarios 
Route::get('/usuarios/crear', [UsuarioController::class, 'crear'])->name('usuarios.crear');
Route::post('/usuarios', [UsuarioController::class, 'almacenar'])->name('usuarios.almacenar');

// Rutas protegidas
Route::get('/inicio', [AutenticacionController::class, 'inicio'])->name('inicio');
Route::get('/libros', [LibroController::class, 'listar'])->name('libros.listar');
Route::get('/libros/crear', [LibroController::class, 'crear'])->name('libros.crear');
Route::post('/libros', [LibroController::class, 'almacenar'])->name('libros.almacenar');
