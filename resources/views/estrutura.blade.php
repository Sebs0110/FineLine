<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    <link rel="icon" href="/favicon.png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <title>FineLine</title>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="https://kit.fontawesome.com/b97162086a.js" crossorigin="anonymous"></script>
    <style>
        .submenu.d-none {
            display: none !important;
        }
        .submenu.d-block {
            display: block !important;
        }
    </style>
</head>
<body style="background-color: #123957">
<div class="d-flex">
    <!-- Sidebar -->
    <div class="text-white vh-100 p-3" style="width: 220px; background-color: #13293A; position: sticky; top: 0;">
        <h3 class="text-warning">FineLine</h3>
        <ul class="nav flex-column">
            <li class="nav-item">
                <a href="javascript:void(0)" class="nav-link text-white menu-toggle">
                    <i class="bi bi-chevron-right me-1 icone"></i>Cadastros
                </a>

                <ul class="nav flex-column d-none ms-3 submenu">
                    <li><a href="#" class="nav-link text-white"><i class="bi bi-person me-2"></i>Passageiros</a></li>
                    <li><a href="#" class="nav-link text-white"><i class="bi bi-building me-2"></i>Empresas</a></li>
                    <li><a href="#" class="nav-link text-white"><i class="bi bi-car-front me-2"></i>Motoristas</a></li>
                    <li><a href="#" class="nav-link text-white"><i class="bi bi-bus-front me-2"></i>Ônibus</a></li>
                    <li><a href="#" class="nav-link text-white"><i class="bi bi-sign-turn-right me-2"></i>Rotas</a></li>
                    <li><a href="#" class="nav-link text-white"><i class="bi bi-calendar-check me-2"></i>Itinerários</a></li>
                    <li><a href="/avisos/create" class="nav-link text-white"><i class="bi bi-cone-striped me-2"></i>Avisos</a></li>
                    <li><a href="#" class="nav-link text-white"><i class="bi bi-signpost me-2"></i>Paradas</a></li>
                </ul>
            </li>
        </ul>
    </div>
    <!-- Conteúdo -->
    <div class="p-4 text-white" style="flex: 1; min-height: 100vh;">
        @yield('content')
    </div>
</div>

<script>
    $(document).ready(function(){
        $(".menu-toggle").on("click", function(e){
            e.preventDefault();
            let submenu = $(this).next(".submenu");
            let icone = $(this).find(".icone");
            
            submenu.toggleClass("d-none d-block");
            icone.toggleClass("bi-chevron-right bi-chevron-down");
        });
    });
</script>
</body>
</html>
