<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Portal del Lector</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.2/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.11.1/font/bootstrap-icons.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f4f6f9;
        }
        .header-main {
            background-color: #2c3e50;
            color: white;
            padding: 2rem;
            border-radius: .75rem;
            margin-bottom: 2.5rem;
        }
        .header-main .btn-primary {
             background-color: #fff;
             color: #2c3e50;
             border-color: #fff;
        }
        .book-card {
            border: 1px solid #dee2e6;
            border-radius: .75rem;
            transition: all .3s ease-in-out;
            background-color: #fff;
        }
        .book-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 0.5rem 1rem rgba(0,0,0,.1);
        }
    </style>
</head>
<body>

    <div class="container my-5">
        <!-- Header -->
        <div class="d-flex justify-content-between align-items-center mb-4">
             <h1 class="h2">Portal del Lector</h1>
             <form method="POST" action="{{ route('cerrar-sesion') }}">
                @csrf
                <button type="submit" class="btn btn-outline-secondary">
                    <i class="bi bi-box-arrow-right"></i> Cerrar Sesión
                </button>
            </form>
        </div>
        
        <!-- Welcome & Catalog Link -->
        <div class="header-main">
            <div class="container-fluid">
                <h2 class="display-6">Bienvenido, {{ $usuarioActual->nombre }}</h2>
                <p class="col-md-8 lead">Explora nuestra colección y encuentra tu próxima aventura literaria.</p>
                <a href="{{ route('libros.catalogo-usuario') }}" class="btn btn-primary fw-bold">
                    <i class="bi bi-journal-richtext"></i> Ver Catálogo Completo
                </a>
            </div>
        </div>

        <!-- Available Books -->
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h3 class="h4"><i class="bi bi-stars"></i> Libros Destacados</h3>
        </div>
        <hr class="mb-4">

        <div class="row g-4">
            @forelse($librosDisponibles as $libro)
                <div class="col-md-6 col-lg-4">
                    <div class="card h-100 book-card">
                        <div class="card-body">
                            <h5 class="card-title mb-1">{{ $libro->titulo }}</h5>
                            <small class="text-muted d-block mb-3">Por: {{ $libro->autor }}</small>
                            <span class="badge bg-dark-subtle border border-dark-subtle text-dark-emphasis rounded-pill fw-normal">
                                {{ $libro->categoria }}
                            </span>
                        </div>
                        <div class="card-footer bg-transparent border-top-0 pt-0">
                             <div class="d-flex justify-content-between align-items-center">
                                <small>Disponibles:</small>
                                <span class="badge bg-success-subtle border border-success-subtle text-success-emphasis rounded-pill">
                                    {{ $libro->stock }}
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col">
                    <div class="alert alert-light text-center">
                        <p class="mb-0">No hay libros disponibles en este momento, ¡vuelve pronto!</p>
                    </div>
                </div>
            @endforelse
        </div>

        <!-- Footer -->
        <footer class="mt-5 py-4 text-center text-muted border-top">
            <p class="mb-0">&copy; {{ date('Y') }} Sistema de Biblioteca. Todos los derechos reservados.</p>
        </footer>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.2/js/bootstrap.bundle.min.js"></script>
</body>
</html>