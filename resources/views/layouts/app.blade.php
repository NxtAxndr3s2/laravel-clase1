{{-- resources/views/layouts/app.blade.php --}}
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Gestión de Estudiantes')</title>

    <!-- Bootstrap 5 CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- CSS personalizado -->
    <style>
        body {
            background: #f5f5f5;
        }

        h1 {
            color: #004225;
            font-weight: bold;
        }

        .card-custom {
            border-radius: 12px;
            box-shadow: 0 4px 10px rgba(0,0,0,0.1);
        }

        .btn-success {
            background-color: #006633;
            border: none;
        }

        .btn-success:hover {
            background-color: #004d26;
        }

        .table thead {
            background-color: #006633;
            color: white;
        }

        .alert-custom {
            border-left: 5px solid #006633;
        }
    </style>
</head>
<body>

    <div class="container mt-4">

        <h1 class="mb-3">🎓 Gestión de Estudiantes — SENA</h1>

        @if(session('success'))
            <div class="alert alert-success alert-custom">
                {{ session('success') }}
            </div>
        @endif

        <div class="card card-custom p-4">
            @yield('content')
        </div>

    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
