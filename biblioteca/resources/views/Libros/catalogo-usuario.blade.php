<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Catálogo de Libros</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.2/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.11.1/font/bootstrap-icons.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f4f7f6;
        }
        .header {
            background: #005f73;
            color: white;
            padding: 2rem 0;
            margin-bottom: 2rem;
        }
        .book-card {
            border: 1px solid #dee2e6;
            border-radius: 10px;
            transition: all 0.3s ease;
        }
        .book-card:hover {
            box-shadow: 0 4px 15px rgba(0,0,0,0.1);
            transform: translateY(-5px);
        }
        .footer {
            background: #e9ecef;
            padding: 2rem 0;
            margin-top: 2rem;
        }
    </style>
</head>
<body>

    <!-- Header -->
    <div class="header">
        <div class="container">
            <h1 class="display-4"><i class="bi bi-grid-3x3-gap-fill"></i> Catálogo de Libros</h1>
            <p class="lead">Explora nuestra colección completa de libros.</p>
        </div>
    </div>

    <div class="container">
        <div class="mb-4">
            <a href="{{ route('inicio') }}" class="btn btn-outline-secondary">
                <i class="bi bi-arrow-left"></i> Volver al Portal
            </a>
        </div>

        <!-- Book Catalog -->
        <div class="row g-4">
            @forelse($libros as $libro)
                <div class="col-md-6 col-lg-4">
                    <div class="card h-100 book-card">
                        <div class="card-body d-flex flex-column">
                            <h5 class="card-title">{{ $libro->titulo }}</h5>
                            <h6 class="card-subtitle mb-2 text-muted">Por: {{ $libro->autor }}</h6>
                            <p class="card-text">
                                <strong>Categoría:</strong> {{ $libro->categoria }}
                            </p>
                            <div class="mt-auto">
                                @if($libro->stock > 0)
                                    <p class="text-success"><strong>Disponibles: {{ $libro->stock }}</strong></p>
                                @else
                                    <p class="text-danger"><strong>Agotado</strong></p>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col">
                    <div class="alert alert-warning">
                        <p class="mb-0">No se encontraron libros en el catálogo.</p>
                    </div>
                </div>
            @endforelse
        </div>
    </div>

    <!-- Footer -->
    <footer class="footer text-center">
        <div class="container">
            <p class="text-muted mb-0">&copy; {{ date('Y') }} Sistema de Biblioteca. Todos los derechos reservados.</p>
        </div>
    </footer>

    <!-- Bootstrap JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.2/js/bootstrap.bundle.min.js"></script>
</body>
</html>