@extends('estrutura')

@section('content')
    <div class="container-fluid">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2 class="text-warning"><i class="bi bi-bus-front me-2"></i>Gerenciar Ônibus</h2>
            <a href="{{ route('onibus.create') }}" class="btn btn-warning">
                <i class="bi bi-plus-circle me-2"></i>Novo Ônibus
            </a>
        </div>

        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <i class="bi bi-check-circle me-2"></i>{{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <div class="card" style="background-color: #13293A; border: none;">
            <div class="card-body">
                @if($onibus->count() > 0)
                    <div class="table-responsive">
                        <table class="table table-dark table-hover align-middle">
                            <thead class="table-secondary">
                            <tr>
                                <th>ID</th>
                                <th>Placa</th>
                                <th>Renavam</th>
                                <th>Modelo</th>
                                <th>Ações</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($onibus as $oni)
                                <tr>
                                    <td>{{ $oni->oni_id }}</td>
                                    <td>{{ $oni->oni_placa }}</td>
                                    <td>{{ $oni->oni_renavan }}</td>
                                    <td>{{ $oni->oni_modelo }}</td>
                                    <td>
                                        <div class="btn-group" role="group">
                                            <a href="{{ route('onibus.show', $oni->oni_id) }}" class="btn btn-sm btn-info" title="Visualizar">
                                                <i class="bi bi-eye"></i>
                                            </a>
                                            <a href="{{ route('onibus.edit', $oni->oni_id) }}" class="btn btn-sm btn-warning" title="Editar">
                                                <i class="bi bi-pencil"></i>
                                            </a>
                                            <button type="button" class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal{{ $oni->oni_id }}" title="Deletar">
                                                <i class="bi bi-trash"></i>
                                            </button>
                                        </div>

                                        <!-- Modal de Confirmação de Exclusão -->
                                        <div class="modal fade" id="deleteModal{{ $oni->oni_id }}" tabindex="-1" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content" style="background-color: #1a3a52;">
                                                    <div class="modal-header" style="border-color: #f39c12;">
                                                        <h5 class="modal-title text-warning">
                                                            <i class="bi bi-exclamation-triangle me-2"></i>Confirmar Exclusão
                                                        </h5>
                                                        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body text-white">
                                                        Tem certeza que deseja deletar o ônibus placa {{ $oni->oni_placa }}?
                                                    </div>
                                                    <div class="modal-footer" style="border-color: #f39c12;">
                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                                                        <form action="{{ route('onibus.destroy', $oni->oni_id) }}" method="POST" style="display: inline;">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="btn btn-danger">Deletar</button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                @else

                @endif
            </div>
        </div>
    </div>

    <style>
        .table-hover tbody tr:hover { background-color: #0f2438 !important; }
        .btn-group .btn { padding: 0.25rem 0.5rem; font-size: 0.875rem; }
        .btn-info { background-color: #17a2b8; border-color: #17a2b8; }
        .btn-warning { background-color: #f39c12; border-color: #f39c12; }
        .btn-danger { background-color: #dc3545; border-color: #dc3545; }
        .table-secondary { background-color: #13293A !important; }
    </style>
@endsection
