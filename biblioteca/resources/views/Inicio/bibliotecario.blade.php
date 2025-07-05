<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel de Administración</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.2/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.11.1/font/bootstrap-icons.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
        }
        .header-main {
            background-color: #2c3e50;
            color: white;
            padding: 2.5rem;
            border-radius: .75rem;
            margin-bottom: 2.5rem;
        }
        .nav-card {
            background-color: #fff;
            border: 1px solid #dee2e6;
            border-radius: .75rem;
            text-decoration: none;
            color: #212529;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            padding: 2rem;
            transition: all 0.3s ease;
            height: 100%;
        }
        .nav-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 0.5rem 1rem rgba(0,0,0,.15);
            color: #0d6efd;
        }
        .nav-card i {
            font-size: 2.5rem;
            margin-bottom: 1rem;
        }
        .stat-card {
            background-color: #2c3e50;
            color: white;
            border-radius: .75rem;
            text-align: center;
            padding: 2rem;
            height: 100%;
        }
        .stat-card h6 {
            opacity: .8;
        }
    </style>
</head>
<body>
    <div class="container my-5">
        <!-- Header -->
        <div class="header-main d-flex justify-content-between align-items-center">
            <div>
                <h1 class="h2">Panel de Administración</h1>
                <p class="mb-0">Bienvenido de nuevo, {{ $usuarioActual->nombre }}.</p>
            </div>
            <form method="POST" action="{{ route('cerrar-sesion') }}">
                @csrf
                <button type="submit" class="btn btn-outline-light">
                    <i class="bi bi-box-arrow-right"></i> Cerrar Sesión
                </button>
            </form>
        </div>

        <!-- Navigation & Statistics -->
        <div class="row g-4">
            <div class="col-lg-8">
                <div class="row h-100">
                    <div class="col-md-4 mb-4 mb-md-0">
                        <a href="{{ route('libros.listar') }}" class="nav-card">
                            <i class="bi bi-book-half"></i>
                            <h5 class="mb-0">Ver Libros</h5>
                        </a>
                    </div>
                    <div class="col-md-4 mb-4 mb-md-0">
                        <a href="{{ route('libros.crear') }}" class="nav-card">
                            <i class="bi bi-plus-circle"></i>
                            <h5 class="mb-0">Agregar Libro</h5>
                        </a>
                    </div>
                    <div class="col-md-4">
                        <a href="{{ route('usuarios.crear') }}" class="nav-card">
                            <i class="bi bi-person-plus"></i>
                            <h5 class="mb-0">Registrar Usuario</h5>
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="stat-card d-flex flex-column justify-content-center">
                    <h6>Total de Libros en el Sistema</h6>
                    <h2 class="display-4 fw-bold">{{ $totalLibros }}</h2>
                </div>
            </div>
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