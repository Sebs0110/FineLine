@extends('estrutura')

@section('content')
    <div class="container-fluid">
        <h1 class="mb-4 text-white">Cadastrar Novo Motorista</h1>

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
                <form action="{{ route('motoristas.store') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="mot_usuario_id" class="form-label">Selecionar Usuário</label>
                        <select name="mot_usuario_id" id="mot_usuario_id" class="form-control bg-secondary text-white border-0" required>
                            <option value="">Selecione um usuário...</option>
                            @foreach($usuarios as $usuario)
                                <option value="{{ $usuario->usu_id }}">{{ $usuario->usu_nome }} ({{ $usuario->usu_email }})</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="mot_numerocarteira" class="form-label">Número da CNH</label>
                        <input type="text" class="form-control bg-secondary text-white border-0" id="mot_numerocarteira" name="mot_numerocarteira" value="{{ old('mot_numerocarteira') }}" placeholder="Ex: 12345678900" required>
                    </div>

                    <div class="mb-3">
                        <label for="mot_validade" class="form-label">Validade da CNH</label>
                        <input type="date" class="form-control bg-secondary text-white border-0" id="mot_validade" name="mot_validade" value="{{ old('mot_validade') }}" required>
                    </div>

                    <div class="d-flex justify-content-between align-items-center mt-4">
                        <a href="{{ route('motoristas.index') }}" class="text-white text-decoration-none">
                            <i class="bi bi-arrow-left"></i> Voltar
                        </a>
                        <button type="submit" class="btn btn-warning px-4 fw-bold">Salvar Motorista</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
