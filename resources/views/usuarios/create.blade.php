@extends('estrutura')

@section('content')
    <div class="container-fluid">
        <h1 class="mb-4 text-white">Cadastrar Novo Usuário</h1>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="card bg-dark text-white border-secondary" style="max-width: 600px;">
            <div class="card-body">
                <form action="{{ route('usuarios.store') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="usu_nome" class="form-label">Nome Completo</label>
                        <input type="text" class="form-control bg-secondary text-white border-0" id="usu_nome" name="usu_nome" value="{{ old('usu_nome') }}" placeholder="Ex: João Silva" required>
                    </div>

                    <div class="mb-3">
                        <label for="usu_email" class="form-label">E-mail</label>
                        <input type="email" class="form-control bg-secondary text-white border-0" id="usu_email" name="usu_email" value="{{ old('usu_email') }}" placeholder="joao@exemplo.com" required>
                    </div>

                    <div class="mb-3">
                        <label for="usu_tipousuario_id" class="form-label">Tipo de Usuário</label>
                        <select name="usu_tipousuario_id" id="usu_tipousuario_id" class="form-control bg-secondary text-white border-0" required>
                            <option value="">Selecione o tipo...</option>
                            <option value="1">Passageiro</option>
                            <option value="2">Motorista</option>
                            <option value="3">Empresa</option>
                        </select>
                    </div>

                    <!-- CAMPOS DINÂMICOS DE MOTORISTA (Escondidos por padrão) -->
                    <div id="campos-motorista" style="display: none;">
                        <hr class="border-secondary">
                        <div class="mb-3">
                            <label for="mot_numerocarteira" class="form-label text-warning">Número da CNH</label>
                            <input type="text" class="form-control bg-secondary text-white border-0" id="mot_numerocarteira" name="mot_numerocarteira" placeholder="Digite a CNH">
                        </div>
                        <div class="mb-3">
                            <label for="mot_validade" class="form-label text-warning">Validade da CNH</label>
                            <input type="date" class="form-control bg-secondary text-white border-0" id="mot_validade" name="mot_validade">
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="usu_senha" class="form-label">Senha</label>
                        <input type="password" class="form-control bg-secondary text-white border-0" id="usu_senha" name="usu_senha" required>
                    </div>

                    <div class="d-flex justify-content-between align-items-center mt-4">
                        <a href="{{ route('usuarios.index') }}" class="text-white text-decoration-none">
                            <i class="bi bi-arrow-left"></i> Voltar
                        </a>
                        <button type="submit" class="btn btn-warning px-4 fw-bold">Salvar Usuário</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- JAVASCRIPT PARA APARECER CNH-->
    <script>
        document.getElementById('usu_tipousuario_id').addEventListener('change', function() {
            const camposMotorista = document.getElementById('campos-motorista');
            // Se o valor selecionado for '2' (Motorista), mostra os campos. Senão, esconde.
            if (this.value === '2') {
                camposMotorista.style.display = 'block';
            } else {
                camposMotorista.style.display = 'none';
            }
        });
    </script>
@endsection
