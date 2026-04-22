@extends('estrutura')

@section('content')
    <div class="container-fluid">
        <h1 class="mb-4 text-white">Detalhes do Usuário</h1>

        <div class="card bg-dark text-white border-secondary" style="max-width: 600px;">
            <div class="card-header border-secondary">
                <h5 class="card-title mb-0">Informações de Cadastro</h5>
            </div>
            <div class="card-body">
                <div class="mb-3">
                    <label class="text-warning fw-bold">ID:</label>
                    <p class="mb-0">{{ $usuario->usu_id }}</p>
                </div>

                <div class="mb-3">
                    <label class="text-warning fw-bold">Nome Completo:</label>
                    <p class="mb-0">{{ $usuario->usu_nome }}</p>
                </div>

                <div class="mb-3">
                    <label class="text-warning fw-bold">E-mail:</label>
                    <p class="mb-0">{{ $usuario->usu_email }}</p>
                </div>

                <div class="mb-3">
                    <label class="text-warning fw-bold">Tipo de Usuário:</label>
                    <p class="mb-0">{{ $usuario->tipoUsuario->tus_nome ?? 'Não definido' }}</p>
                </div>

                <div class="mb-3">
                    <label class="text-warning fw-bold">Data de Cadastro:</label>
                    <p class="mb-0">{{ $usuario->created_at->format('d/m/Y H:i') }}</p>
                </div>

                <div class="d-flex justify-content-between align-items-center mt-4">
                    <a href="{{ route('usuarios.index') }}" class="text-white text-decoration-none">
                        <i class="bi bi-arrow-left"></i> Voltar para a lista
                    </a>
                    <a href="{{ route('usuarios.edit', $usuario->usu_id) }}" class="btn btn-warning px-4 fw-bold">
                        <i class="bi bi-pencil"></i> Editar
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection

