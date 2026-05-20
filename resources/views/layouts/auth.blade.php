<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Favicon -->
    <link rel="icon" href="/favicon.png">

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])

    <style>
        body {
            background-color: #123957;
            background: linear-gradient(135deg, #123957 0%, #13293A 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .auth-container {
            width: 100%;
            max-width: 450px;
            padding: 15px;
        }

        .card {
            background-color: #1a3a52;
            border: 1px solid #2c4e69;
            border-radius: 8px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.3);
        }

        .card-header {
            background-color: #13293A;
            border-bottom: 2px solid #f39c12;
            color: #f39c12;
            font-weight: 600;
            padding: 1.5rem;
            border-radius: 8px 8px 0 0;
        }

        .card-body {
            padding: 2rem;
            color: #ffffff;
        }

        .form-control {
            background-color: #0f2438;
            border: 1px solid #2c4e69;
            color: #ffffff;
            border-radius: 4px;
        }

        .form-control:focus {
            background-color: #0f2438;
            border-color: #f39c12;
            color: #ffffff;
            box-shadow: 0 0 0 0.2rem rgba(243, 156, 18, 0.25);
        }

        .form-control::placeholder {
            color: #7a9bb5;
        }

        .col-form-label {
            color: #b8c5d6;
        }

        .btn-primary {
            background-color: #f39c12;
            border-color: #f39c12;
            color: #13293A;
            font-weight: 600;
            transition: all 0.3s ease;
        }

        .btn-primary:hover {
            background-color: #e67e22;
            border-color: #e67e22;
            color: #ffffff;
        }

        .btn-link {
            color: #f39c12;
            text-decoration: none;
        }

        .btn-link:hover {
            color: #e67e22;
            text-decoration: underline;
        }

        .form-check-label {
            color: #b8c5d6;
        }

        .form-check-input {
            background-color: #0f2438;
            border: 1px solid #2c4e69;
        }

        .form-check-input:checked {
            background-color: #f39c12;
            border-color: #f39c12;
        }

        .invalid-feedback {
            color: #ff6b6b;
        }

        .form-control.is-invalid {
            border-color: #ff6b6b;
        }

        .form-control.is-invalid:focus {
            border-color: #ff6b6b;
            box-shadow: 0 0 0 0.2rem rgba(255, 107, 107, 0.25);
        }

        .logo-container {
            text-align: center;
            margin-bottom: 2rem;
        }

        .logo-container h2 {
            color: #f39c12;
            font-weight: 700;
            margin: 0;
        }

        .logo-container p {
            color: #7a9bb5;
            font-size: 0.9rem;
            margin: 0.5rem 0 0 0;
        }
    </style>
</head>
<body>
    <div class="auth-container">
        <div class="logo-container">
            <h2><i class="bi bi-bus-front"></i> FineLine</h2>
            <p>Sistema de Controle de Rotas</p>
        </div>

        <div class="card">
            @yield('content')
        </div>
    </div>
</body>
</html>
