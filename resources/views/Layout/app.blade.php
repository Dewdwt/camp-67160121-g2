{{-- resources/views/layouts/app.blade.php --}}
<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>ระบบจัดการ Pokedex - @yield('title')</title>

    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <style>
        :root {
            --primary: #ef5350;
            --primary-dark: #c62828;
            --secondary: #42a5f5;
            --light: #f5f5f5;
            --dark: #212121;
            --success: #4caf50;
            --warning: #ff9800;
            --danger: #f44336;
        }

        body {
            background-color: #f8f9fa;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        .navbar {
            background: linear-gradient(135deg, var(--primary), var(--primary-dark));
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        }

        .navbar-brand {
            font-weight: 700;
            font-size: 1.5rem;
        }

        .pokemon-card {
            border: none;
            border-radius: 15px;
            overflow: hidden;
            transition: transform 0.3s, box-shadow 0.3s;
            height: 100%;
        }

        .pokemon-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.15);
        }

        .pokemon-img {
            height: 200px;
            background: linear-gradient(135deg, #f5f5f5, #e0e0e0);
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
        }

        .pokemon-img img {
            max-height: 160px;
            max-width: 100%;
            transition: transform 0.3s;
        }

        .pokemon-card:hover .pokemon-img img {
            transform: scale(1.05);
        }

        .type-badge {
            font-size: 0.85rem;
            padding: 5px 12px;
            border-radius: 20px;
            font-weight: 600;
        }

        .stats-bar {
            height: 8px;
            border-radius: 4px;
            margin-top: 5px;
            background-color: #e0e0e0;
            overflow: hidden;
        }

        .stats-fill {
            height: 100%;
            border-radius: 4px;
        }

        .btn-pokemon {
            padding: 8px 20px;
            border-radius: 25px;
            font-weight: 600;
            transition: all 0.3s;
        }

        .btn-pokemon-primary {
            background-color: var(--primary);
            color: white;
            border: none;
        }

        .btn-pokemon-primary:hover {
            background-color: var(--primary-dark);
            color: white;
            transform: translateY(-2px);
        }

        .alert-pokemon {
            border-radius: 10px;
            border: none;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
        }

        .page-title {
            color: var(--primary-dark);
            font-weight: 700;
            margin-bottom: 1.5rem;
            padding-bottom: 10px;
            border-bottom: 3px solid var(--primary);
        }
    </style>

    @yield('styles')
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark">
        <div class="container">
            <a class="navbar-brand" href="{{ route('pokedex.index') }}">
                <i class="fas fa-dragon me-2"></i>Pokedex Manager
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link active" href="{{ route('pokedex.index') }}">
                            <i class="fas fa-home me-1"></i> หน้าแรก
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('pokedex.create') }}">
                            <i class="fas fa-plus-circle me-1"></i> เพิ่มโปเกมอน
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <main class="py-4">
        <div class="container">
            @if(session('success'))
                <div class="alert alert-success alert-pokemon alert-dismissible fade show" role="alert">
                    <i class="fas fa-check-circle me-2"></i> {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            @endif

            @if(session('error'))
                <div class="alert alert-danger alert-pokemon alert-dismissible fade show" role="alert">
                    <i class="fas fa-exclamation-circle me-2"></i> {{ session('error') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            @endif

            @yield('content')
        </div>
    </main>

    <footer class="bg-dark text-white py-4 mt-5">
        <div class="container text-center">
            <p class="mb-0">ระบบจัดการข้อมูล Pokedex | สร้างด้วย Laravel</p>
            <p class="mb-0">สำหรับนิสิตในการเรียนรู้การสร้าง CRUD Application</p>
        </div>
    </footer>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

    @yield('scripts')
</body>
</html>
