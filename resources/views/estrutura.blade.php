<!DOCTYPE html>
<html lang="pt-BR">
<head>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="icon" href="/favicon.png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <title>FineLine</title>
    <script src="https://kit.fontawesome.com/b97162086a.js" crossorigin="anonymous"></script>
</head>
<body style="background-color: #123957">
<div class="d-flex">
    <!-- Sidebar -->
    <div class="text-white vh-100 p-3" style="width: 220px; background-color: #13293A">
        <h3 class="text-warning">FineLine</h3>
        <ul class="nav flex-column">
            <li class="nav-item">
                <a href="#" class="nav-link text-white menu-toggle">
                    <i class="bi bi-chevron-right me-1 icone"></i>Cadastros
                </a>

                <ul class="nav flex-column invisible ms-3 submenu">
                    <li><a href="#" class="nav-link text-white"><i class="bi bi-person me-2"></i>Passageiros</a></li>
                    <li><a href="#" class="nav-link text-white"><i class="bi bi-building me-2"></i>Empresas</a></li>
                    <li><a href="#" class="nav-link text-white"><i class="bi bi-car-front me-2"></i>Motoristas</a></li>
                    <li><a href="#" class="nav-link text-white"><i class="bi bi-bus-front me-2"></i>Ônibus</a></li>
                    <li><a href="#" class="nav-link text-white"><i class="bi bi-sign-turn-right me-2"></i>Rotas</a></li>
                    <li><a href="#" class="nav-link text-white"><i class="bi bi-calendar-check me-2"></i>Itinerários</a></li>
                    <li><a href="{{ route('avisos.create') }}" class="nav-link text-white"><i class="bi bi-cone-striped me-2"></i>Avisos</a></li>
                    <li><a href="#" class="nav-link text-white"><i class="bi bi-signpost me-2"></i>Paradas</a></li>
                </ul>
            </li>
        </ul>
    </div>
    <!-- Conteúdo -->
    <div class="p-4 text-white" style="flex: 1; overflow-y: auto;">
        @yield('content')
    </div>
</div>
</body>
<script type="module">
    $(document).ready(function(){

        $(".menu-toggle").on("click", function(){

            let submenu = $(".submenu");
            let icone = $(this).find(".icone");
            submenu.toggleClass("invisible visible");
            icone.toggleClass("bi-chevron-right bi-chevron-down");

        });

    });
</script>
</html>
