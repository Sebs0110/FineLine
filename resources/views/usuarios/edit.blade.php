@extends('estrutura')

@section('content')
    <div class="container-fluid">
        <h1 class="mb-4 text-white">Editar Usuário</h1>

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
                {{-- A rota de update precisa do ID do usuário ($usuario->usu_id) --}}
                <form action="{{ route('usuarios.update', $usuario->usu_id) }}" method="POST">
                    @csrf
                    {{-- Diretiva obrigatória para o Laravel entender que é uma ATUALIZAÇÃO --}}
                    @method('PUT')

                    <div class="mb-3">
                        <label for="usu_nome" class="form-label">Nome Completo</label>
                        <input type="text" class="form-control bg-secondary text-white border-0" id="usu_nome" name="usu_nome" value="{{ old('usu_nome', $usuario->usu_nome) }}" required>
                    </div>

                    <div class="mb-3">
                        <label for="usu_email" class="form-label">E-mail</label>
                        <input type="email" class="form-control bg-secondary text-white border-0" id="usu_email" name="usu_email" value="{{ old('usu_email', $usuario->usu_email) }}" required>
                    </div>

                    <div class="mb-3">
                        <label for="usu_senha" class="form-label">Nova Senha (deixe em branco para manter a atual)</label>
                        <input type="password" class="form-control bg-secondary text-white border-0" id="usu_senha" name="usu_senha">
                        <small class="text-muted">Preencha apenas se desejar alterar a senha.</small>
                    </div>

                    <div class="d-flex justify-content-between align-items-center mt-4">
                        <a href="{{ route('usuarios.index') }}" class="text-white text-decoration-none">
                            <i class="bi bi-arrow-left"></i> Cancelar
                        </a>
                        <button type="submit" class="btn btn-warning px-4 fw-bold">Atualizar Dados</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

