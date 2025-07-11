@extends('layout')

@section('content')
<style>
    body {
        background-color: #f4f6f9;
    }
    .form-card {
        border: none;
        border-radius: 10px;
        box-shadow: 0 4px 20px rgba(0,0,0,0.05);
    }
    .form-card .card-header {
        background-color: #2c3e50;
        color: white;
        border-bottom: none;
        padding: 1.5rem;
    }
    .form-card .btn-primary {
        background-color: #2c3e50;
        border-color: #2c3e50;
    }
    .form-card .btn-primary:hover {
        background-color: #34495e;
        border-color: #34495e;
    }
</style>

<div class="container d-flex justify-content-center align-items-center" style="min-height: 100vh;">
    <div class="col-md-6 col-lg-5">
        <div class="card form-card">
            <div class="card-header text-center">
                <h4 class="mb-0"><i class="bi bi-book-half"></i> Registrar Libro</h4>
            </div>
            <div class="card-body p-4">
                @if(session('error'))
                    <div class="alert alert-danger">{{ session('error') }}</div>
                @endif
                @if(session('success'))
                    <div class="alert alert-success">{{ session('success') }}</div>
                @endif

                <form method="POST" action="{{ route('libros.almacenar') }}">
                    @csrf

                    <div class="mb-3">
                        <label for="titulo" class="form-label">Título</label>
                        <input type="text" name="titulo" id="titulo" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label for="autor" class="form-label">Autor</label>
                        <input type="text" name="autor" id="autor" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label for="categoria" class="form-label">Categoría</label>
                        <input type="text" name="categoria" id="categoria" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label for="stock" class="form-label">Stock</label>
                        <input type="number" name="stock" id="stock" class="form-control" required min="0">
                    </div>

                    <div class="d-grid gap-2 mt-4">
                        <button class="btn btn-primary btn-lg" type="submit">
                            <i class="bi bi-save"></i> Guardar Libro
                        </button>
                        <a href="{{ route('inicio') }}" class="btn btn-outline-secondary">
                            <i class="bi bi-arrow-left"></i> Volver al Panel
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

