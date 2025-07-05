@extends('layout')

@section('content')
<style>
    body {
        background-color: #f4f6f9;
    }
    .auth-card {
        border: none;
        border-radius: 10px;
        box-shadow: 0 4px 20px rgba(0,0,0,0.05);
        overflow: hidden;
    }
    .auth-card .card-header {
        background-color: #2c3e50;
        color: white;
        border-bottom: none;
        padding: 1.5rem;
    }
    .auth-card .btn-primary {
        background-color: #2c3e50;
        border-color: #2c3e50;
    }
    .auth-card .btn-primary:hover {
        background-color: #34495e;
        border-color: #34495e;
    }
    .form-floating label {
        color: #6c757d;
    }
</style>

<div class="container d-flex justify-content-center align-items-center" style="min-height: 100vh;">
    <div class="col-md-6 col-lg-5">
        <div class="card auth-card">
            <div class="card-header text-center">
                <h4 class="mb-0"><i class="bi bi-box-arrow-in-right"></i> Iniciar Sesión</h4>
            </div>
            <div class="card-body p-4 p-md-5">
                @if(session('error'))
                    <div class="alert alert-danger">{{ session('error') }}</div>
                @endif
                @if(session('success'))
                    <div class="alert alert-success">{{ session('success') }}</div>
                @endif

                <form method="POST" action="{{ url('/autenticar') }}">
                    @csrf
                    <div class="form-floating mb-3">
                        <input type="email" name="correo" id="correo" class="form-control" placeholder="Correo electrónico" required>
                        <label for="correo">Correo Electrónico</label>
                    </div>

                    <div class="form-floating mb-4">
                        <input type="password" name="contrasena" id="contrasena" class="form-control" placeholder="Contraseña" required>
                        <label for="contrasena">Contraseña</label>
                    </div>

                    <div class="d-grid">
                        <button class="btn btn-primary btn-lg" type="submit">
                            <i class="bi bi-door-open-fill"></i> Iniciar Sesión
                        </button>
                    </div>
                </form>

                <div class="text-center mt-4">
                    <a href="{{ route('usuarios.crear') }}" class="text-secondary">¿No tienes una cuenta? Regístrate</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
