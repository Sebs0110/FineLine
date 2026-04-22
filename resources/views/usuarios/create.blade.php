@extends('estrutura')

@section('content')
    <div class="container-fluid">
        <h1 class="mb-4 text-white">Cadastrar Novo Usuário</h1>

        {{-- Exibição de erros de validação (ex: e-mail já existe ou senha curta) --}}
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
                        <label for="usu_senha" class="form-label">Senha</label>
                        <input type="password" class="form-control bg-secondary text-white border-0" id="usu_senha" name="usu_senha" required>
                        <small class="text-muted">Mínimo de 8 caracteres.</small>
                    </div>

                    <div class="d-flex justify-content-between align-items-center mt-4">
                        <a href="{{ route('usuarios.index') }}" class="text-white text-decoration-none">
                            <i class="bi bi-arrow-left"></i> Voltar para a lista
                        </a>
                        <button type="submit" class="btn btn-warning px-4 fw-bold">Salvar Usuário</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection


