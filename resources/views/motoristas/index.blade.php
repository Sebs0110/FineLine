@extends('estrutura')

@section('content')
    <div class="container-fluid">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1 class="text-white">Lista de Motoristas</h1>
            <a href="{{ route('motoristas.create') }}" class="btn btn-warning fw-bold">Novo Motorista</a>
        </div>

        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <div class="card bg-dark text-white border-secondary">
            <div class="card-body p-0">
                <table class="table table-dark table-hover mb-0">
                    <thead>
                    <tr>
                        <th>Nome</th>
                        <th>CNH</th>
                        <th>Validade</th>
                        <th>Ações</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($motoristas as $motorista)
                        <tr>
                            <td>{{ $motorista->usuario->usu_nome }}</td>
                            <td>{{ $motorista->mot_numerocarteira }}</td>
                            <td>{{ \Carbon\Carbon::parse($motorista->mot_validade)->format('d/m/Y') }}</td>
                            <td>
                                <a href="{{ route('motoristas.edit', $motorista->mot_id) }}" class="btn btn-sm btn-outline-info">Editar</a>
                                <form action="{{ route('motoristas.destroy', $motorista->mot_id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-outline-danger" onclick="return confirm('Tem certeza?')">Excluir</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection

