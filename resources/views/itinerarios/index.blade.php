@extends('estrutura')

@section('content')
    <div class="container-fluid">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2 class="text-warning"><i class="bi bi-calendar-event me-2"></i>Gerenciar Itinerários</h2>
            <a href="{{ route('itinerarios.create') }}" class="btn btn-warning">
                <i class="bi bi-plus-circle me-2"></i>Novo Itinerário
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
                @if($itinerarios->count() > 0)
                    <div class="table-responsive">
                        <table class="table table-dark table-hover align-middle">
                            <thead class="table-secondary">
                            <tr>
                                <th>ID</th>
                                <th>Rota</th>
                                <th>Horário de Saída</th>
                                <th>Dia da Semana</th>
                                <th>Ações</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($itinerarios as $itinerario)
                                <tr>
                                    <td>{{ $itinerario->iti_id }}</td>
                                    <td>{{ $itinerario->rota->rot_nome }}</td>
                                    <td>{{ \Carbon\Carbon::parse($itinerario->iti_horariosaida)->format('H:i') }}</td>
                                    <td>{{ $itinerario->iti_diadasemana }}</td>
                                    <td>
                                        <div class="btn-group" role="group">
                                            <a href="{{ route('itinerarios.show', $itinerario->iti_id) }}" class="btn btn-sm btn-info" title="Visualizar">
                                                <i class="bi bi-eye"></i>
                                            </a>
                                            <a href="{{ route('itinerarios.edit', $itinerario->iti_id) }}" class="btn btn-sm btn-warning" title="Editar">
                                                <i class="bi bi-pencil"></i>
                                            </a>
                                            <button type="button" class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal{{ $itinerario->iti_id }}" title="Deletar">
                                                <i class="bi bi-trash"></i>
                                            </button>
                                        </div>

                                        <!-- Modal de Confirmação de Exclusão -->
                                        <div class="modal fade" id="deleteModal{{ $itinerario->iti_id }}" tabindex="-1" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content" style="background-color: #1a3a52;">
                                                    <div class="modal-header" style="border-color: #f39c12;">
                                                        <h5 class="modal-title text-warning">
                                                            <i class="bi bi-exclamation-triangle me-2"></i>Confirmar Exclusão
                                                        </h5>
                                                        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body text-white">
                                                        Tem certeza que deseja deletar o itinerário da rota {{ $itinerario->rota->rot_nome }} às {{ $itinerario->iti_horariosaida }}?
                                                    </div>
                                                    <div class="modal-footer" style="border-color: #f39c12;">
                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                                                        <form action="{{ route('itinerarios.destroy', $itinerario->iti_id) }}" method="POST" style="display: inline;">
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
                    <div class="alert alert-info" role="alert">
                        <i class="bi bi-info-circle me-2"></i>Nenhum itinerário cadastrado. <a href="{{ route('itinerarios.create') }}" class="alert-link">Clique aqui para cadastrar.</a>
                    </div>
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
