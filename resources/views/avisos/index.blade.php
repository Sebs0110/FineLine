@extends('estrutura')

@section('content')
<div class="container-fluid">
    <div class="row mb-4">
        <div class="col-md-8">
            <h2 class="text-warning">
                <i class="bi bi-cone-striped me-2"></i>Avisos
            </h2>
        </div>
        <div class="col-md-4 text-end">
            <a href="{{ route('avisos.create') }}" class="btn btn-warning">
                <i class="bi bi-plus-circle me-2"></i>Novo Aviso
            </a>
        </div>
    </div>

    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <i class="bi bi-check-circle me-2"></i>{{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    @if (session('error'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <i class="bi bi-exclamation-circle me-2"></i>{{ session('error') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div class="card" style="background-color: #1a3a52; border-color: #f39c12;">
        <div class="card-header" style="background-color: #13293A; border-color: #f39c12;">
            <h5 class="text-warning mb-0">
                <i class="bi bi-list me-2"></i>Lista de Avisos
            </h5>
        </div>
        <div class="card-body">
            @if ($avisos->count() > 0)
                <div class="table-responsive">
                    <table class="table table-hover table-dark">
                        <thead class="table-secondary">
                            <tr>
                                <th scope="col" style="width: 10%;">ID</th>
                                <th scope="col" style="width: 50%;">Descrição</th>
                                <th scope="col" style="width: 20%;">Data de Cadastro</th>
                                <th scope="col" style="width: 20%;">Ações</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($avisos as $aviso)
                                <tr>
                                    <td>{{ $aviso->avi_id }}</td>
                                    <td>
                                        <span title="{{ $aviso->avi_descricao }}">
                                            {{ Str::limit($aviso->avi_descricao, 50, '...') }}
                                        </span>
                                    </td>
                                    <td>{{ $aviso->avi_datacadastro->format('d/m/Y') }}</td>
                                    <td>
                                        <div class="btn-group" role="group">
                                            <a href="{{ route('avisos.show', $aviso->avi_id) }}" class="btn btn-sm btn-info" title="Visualizar">
                                                <i class="bi bi-eye"></i>
                                            </a>
                                            <a href="{{ route('avisos.edit', $aviso->avi_id) }}" class="btn btn-sm btn-warning" title="Editar">
                                                <i class="bi bi-pencil"></i>
                                            </a>
                                            <button type="button" class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal{{ $aviso->avi_id }}" title="Deletar">
                                                <i class="bi bi-trash"></i>
                                            </button>
                                        </div>

                                        <!-- Modal de Confirmação de Exclusão -->
                                        <div class="modal fade" id="deleteModal{{ $aviso->avi_id }}" tabindex="-1" aria-labelledby="deleteModalLabel{{ $aviso->avi_id }}" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content" style="background-color: #1a3a52;">
                                                    <div class="modal-header" style="border-color: #f39c12;">
                                                        <h5 class="modal-title text-warning" id="deleteModalLabel{{ $aviso->avi_id }}">
                                                            <i class="bi bi-exclamation-triangle me-2"></i>Confirmar Exclusão
                                                        </h5>
                                                        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body text-white">
                                                        Tem certeza que deseja deletar este aviso? Esta ação não pode ser desfeita.
                                                    </div>
                                                    <div class="modal-footer" style="border-color: #f39c12;">
                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                                                        <form action="{{ route('avisos.destroy', $aviso->avi_id) }}" method="POST" style="display: inline;">
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
                    <i class="bi bi-info-circle me-2"></i>Nenhum aviso cadastrado. <a href="{{ route('avisos.create') }}" class="alert-link">Clique aqui para criar um novo aviso.</a>
                </div>
            @endif
        </div>
    </div>
</div>

<style>
    .table-hover tbody tr:hover {
        background-color: #0f2438 !important;
    }

    .btn-group .btn {
        padding: 0.25rem 0.5rem;
        font-size: 0.875rem;
    }

    .btn-info {
        background-color: #17a2b8;
        border-color: #17a2b8;
    }

    .btn-info:hover {
        background-color: #138496;
        border-color: #138496;
    }

    .btn-warning {
        background-color: #f39c12;
        border-color: #f39c12;
    }

    .btn-warning:hover {
        background-color: #e67e22;
        border-color: #e67e22;
    }

    .btn-danger {
        background-color: #dc3545;
        border-color: #dc3545;
    }

    .btn-danger:hover {
        background-color: #c82333;
        border-color: #c82333;
    }

    .table-secondary {
        background-color: #13293A !important;
    }
</style>
@endsection
