<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestión de Libros</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.2/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.11.1/font/bootstrap-icons.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f4f6f9;
        }
        .table thead {
            background-color: #2c3e50;
            color: white;
        }
        .btn-primary {
            background-color: #2c3e50;
            border-color: #2c3e50;
        }
        .btn-primary:hover {
            background-color: #34495e;
            border-color: #34495e;
        }
        .card {
            border: none;
            box-shadow: 0 4px 20px rgba(0,0,0,0.05);
        }
        .table-hover tbody tr:hover {
            background-color: #e9ecef;
        }
    </style>
</head>
<body>
    <div class="container my-5">
        <!-- Header -->
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1 class="h2"><i class="bi bi-bookshelf"></i> Gestión de Libros</h1>
            <div>
                <a href="{{ route('libros.crear') }}" class="btn btn-primary">
                    <i class="bi bi-plus-circle-fill"></i> Agregar Libro
                </a>
                <a href="{{ route('inicio') }}" class="btn btn-outline-secondary">
                    <i class="bi bi-arrow-left-circle"></i> Volver al Panel
                </a>
                <form method="POST" action="{{ route('cerrar-sesion') }}" class="d-inline">
                    @csrf
                    <button type="submit" class="btn btn-outline-danger" title="Cerrar Sesión">
                        <i class="bi bi-box-arrow-right"></i>
                    </button>
                </form>
            </div>
        </div>

        <!-- Alert Messages -->
        @if(session('exito'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('exito') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        @if(session('error'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                {{ session('error') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <!-- Books Table -->
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-hover align-middle">
                        <thead>
                            <tr>
                                <th scope="col">Título</th>
                                <th scope="col">Autor</th>
                                <th scope="col">Categoría</th>
                                <th scope="col" class="text-center">Stock</th>
                                <th scope="col" class="text-end">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($libros as $libro)
                                <tr>
                                    <td>{{ $libro->titulo }}</td>
                                    <td>{{ $libro->autor }}</td>
                                    <td>
                                        <span class="badge bg-secondary-subtle border border-secondary-subtle text-secondary-emphasis rounded-pill fw-normal">{{ $libro->categoria }}</span>
                                    </td>
                                    <td class="text-center">
                                        @if($libro->stock == 0)
                                            <span class="badge bg-danger-subtle border border-danger-subtle text-danger-emphasis rounded-pill fw-normal">Agotado</span>
                                        @elseif($libro->stock <= 5)
                                            <span class="badge bg-warning-subtle border border-warning-subtle text-warning-emphasis rounded-pill fw-normal">Bajo stock ({{ $libro->stock }})</span>
                                        @else
                                            <span class="badge bg-success-subtle border border-success-subtle text-success-emphasis rounded-pill fw-normal">{{ $libro->stock }}</span>
                                        @endif
                                    </td>
                                    <td class="text-end">
                                        <a href="{{ route('libros.editar', $libro->id) }}" class="btn btn-sm btn-outline-dark me-1">
                                            <i class="bi bi-pencil-fill"></i> Editar
                                        </a>
                                        <form action="{{ route('libros.eliminar', $libro->id) }}" method="POST" class="d-inline" onsubmit="return confirm('¿Estás seguro de que quieres eliminar este libro?');">
                                            @csrf
                                            <button type="submit" class="btn btn-sm btn-outline-danger">
                                                <i class="bi bi-trash-fill"></i> Eliminar
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="text-center p-4">No hay libros registrados actualmente.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <!-- Footer -->
        <footer class="mt-5 py-4 text-center text-muted">
            <p class="mb-0">&copy; {{ date('Y') }} Sistema de Biblioteca. Todos los derechos reservados.</p>
        </footer>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.2/js/bootstrap.bundle.min.js"></script>
</body>
</html>
