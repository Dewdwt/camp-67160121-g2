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

    <style>
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
    </style>
</head>

<body>
    <div class="container">
        <h1>Default Template</h1>
        @yield('content')
    </div>

    @stack('scripts')
</body>
</html>
