<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8" />
    <title>Workshop HTML</title>

    <!-- Bootstrap -->
    <link rel="stylesheet" href="css/bootstrap.css" />

    <!-- Google Font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+Thai:wght@300;400;600;700&display=swap" rel="stylesheet">

    <!-- เพิ่ม Font Awesome สำหรับไอคอน -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <style>
        /* รหัส CSS เดิมทั้งหมด */
        body {
            min-height: 100vh;
            background: linear-gradient(135deg, #e3f2fd, #ede7f6);
            font-family: "Noto Sans Thai", sans-serif;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .container {
            max-width: 700px;
            background: #ffffff;
            padding: 40px;
            border-radius: 20px;
            box-shadow: 0 15px 40px rgba(0,0,0,0.12);
            animation: fadeIn 0.6s ease-in-out;
        }

        h1 {
            text-align: center;
            margin-bottom: 30px;
            font-weight: 700;
            color: #3f51b5;
        }

        .form-label {
            font-weight: 600;
            color: #333;
        }

        textarea,
        input,
        select {
            border-radius: 10px !important;
        }

        textarea:focus,
        input:focus,
        select:focus {
            box-shadow: 0 0 0 0.2rem rgba(63, 81, 181, 0.25);
            border-color: #3f51b5;
        }

        .actions {
            display: flex;
            justify-content: space-between;
            gap: 15px;
            margin-top: 30px;
        }

        button {
            flex: 1;
            padding: 12px;
            font-size: 16px;
            border-radius: 12px;
            font-weight: 600;
            transition: all 0.3s ease;
        }

        .reset {
            background: #f44336;
            color: #fff;
        }

        .reset:hover {
            background: #d32f2f;
            transform: translateY(-2px);
        }

        .save {
            background: #4caf50;
            color: #fff;
        }

        .save:hover {
            background: #388e3c;
            transform: translateY(-2px);
        }

        .gender-row label {
            margin-right: 20px;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(15px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* เพิ่มส่วนใหม่สำหรับ Pokedex */
        .pokedex-nav {
            position: fixed;
            top: 20px;
            right: 20px;
            z-index: 1000;
        }

        .btn-pokedex {
            background: linear-gradient(135deg, #ef5350, #c62828);
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 25px;
            font-weight: 600;
            text-decoration: none;
            display: flex;
            align-items: center;
            gap: 8px;
            box-shadow: 0 4px 12px rgba(239, 83, 80, 0.3);
            transition: all 0.3s ease;
        }

        .btn-pokedex:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 18px rgba(239, 83, 80, 0.4);
            color: white;
            text-decoration: none;
        }

        @media (max-width: 768px) {
            .pokedex-nav {
                top: 10px;
                right: 10px;
            }

            .btn-pokedex {
                padding: 8px 16px;
                font-size: 0.9rem;
            }
        }

        /* เพิ่มคลาสสำหรับหน้าอื่นๆ */
        .container-large {
            max-width: 1200px;
        }

        .page-title {
            color: #ef5350;
            border-bottom: 2px solid #ef5350;
            padding-bottom: 10px;
            margin-bottom: 25px;
        }

        /* เพิ่มสไตล์สำหรับ alerts */
        .alert-pokemon {
            border-radius: 10px;
            border-left: 4px solid;
        }

        .alert-success.alert-pokemon {
            border-left-color: #4caf50;
        }

        .alert-danger.alert-pokemon {
            border-left-color: #f44336;
        }
    </style>

    <!-- เพิ่มส่วนสำหรับสไตล์เพิ่มเติมจากแต่ละหน้า -->
    @stack('styles')
</head>

<body>
    <!-- ปุ่ม Pokedex ลอย -->
    <div class="pokedex-nav">
        <a href="{{ route('pokedex.index') }}" class="btn-pokedex">
            <i class="fas fa-dragon"></i>
            Pokedex System
        </a>
    </div>

    <div class="container @if(View::hasSection('container-class')) @yield('container-class') @endif">
        <!-- เพิ่มแจ้งเตือนจาก session -->
        @if(session('success'))
            <div class="alert alert-success alert-pokemon alert-dismissible fade show" role="alert">
                <i class="fas fa-check-circle me-2"></i>
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif

        @if(session('error'))
            <div class="alert alert-danger alert-pokemon alert-dismissible fade show" role="alert">
                <i class="fas fa-exclamation-circle me-2"></i>
                {{ session('error') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif

        <!-- แสดงข้อผิดพลาดจากการ validate -->
        @if($errors->any())
            <div class="alert alert-danger alert-pokemon alert-dismissible fade show" role="alert">
                <i class="fas fa-exclamation-triangle me-2"></i>
                <strong>พบข้อผิดพลาด!</strong>
                <ul class="mb-0 mt-2">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif

        <h1>@yield('page-title', 'Workshop HTML')</h1>
        @yield('content')
    </div>

    <!-- เพิ่ม Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    @stack('scripts')
</body>
</html>
