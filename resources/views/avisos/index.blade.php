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
        <div class="alert alert-success alert-dismissible fade show" role="alert" style="background-color: #1a4d2e; color: #d4edda; border-color: #c3e6cb;">
            <i class="bi bi-check-circle me-2"></i>{{ session('success') }}
            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div class="card" style="background-color: #1a3a52; border-color: #f39c12;">
        <div class="card-header" style="background-color: #13293A; border-color: #f39c12;">
            <h5 class="text-warning mb-0">
                <i class="bi bi-list me-2"></i>Lista de Avisos
            </h5>
        </div>
        <div class="card-body p-0">
            @if ($avisos->count() > 0)
                <div class="table-responsive">
                    <table class="table table-dark table-hover mb-0" style="background-color: #1a3a52;">
                        <thead>
                            <tr style="border-bottom: 2px solid #f39c12;">
                                <th scope="col" class="text-warning" style="width: 10%; padding: 15px;">ID</th>
                                <th scope="col" class="text-warning" style="width: 50%; padding: 15px;">Descrição</th>
                                <th scope="col" class="text-warning" style="width: 20%; padding: 15px;">Data de Cadastro</th>
                                <th scope="col" class="text-warning text-center" style="width: 20%; padding: 15px;">Ações</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($avisos as $aviso)
                                <tr style="border-bottom: 1px solid #2c4e69;">
                                    <td style="padding: 15px; vertical-align: middle;">{{ $aviso->avi_id }}</td>
                                    <td style="padding: 15px; vertical-align: middle;">
                                        <span title="{{ $aviso->avi_descricao }}">
                                            {{ Str::limit($aviso->avi_descricao, 60, '...') }}
                                        </span>
                                    </td>
                                    <td style="padding: 15px; vertical-align: middle;">{{ $aviso->avi_datacadastro->format('d/m/Y') }}</td>
                                    <td class="text-center" style="padding: 15px; vertical-align: middle;">
                                        <div class="btn-group" role="group">
                                            <a href="{{ route('avisos.show', $aviso->avi_id) }}" class="btn btn-sm btn-outline-info" title="Visualizar">
                                                <i class="bi bi-eye"></i>
                                            </a>
                                            <a href="{{ route('avisos.edit', $aviso->avi_id) }}" class="btn btn-sm btn-outline-warning" title="Editar">
                                                <i class="bi bi-pencil"></i>
                                            </a>
                                            <button type="button" class="btn btn-sm btn-outline-danger" data-bs-toggle="modal" data-bs-target="#deleteModal{{ $aviso->avi_id }}" title="Deletar">
                                                <i class="bi bi-trash"></i>
                                            </button>
                                        </div>

                                        <!-- Modal de Confirmação de Exclusão -->
                                        <div class="modal fade" id="deleteModal{{ $aviso->avi_id }}" tabindex="-1" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content" style="background-color: #13293A; border: 1px solid #f39c12;">
                                                    <div class="modal-header" style="border-bottom: 1px solid #f39c12;">
                                                        <h5 class="modal-title text-warning">
                                                            <i class="bi bi-exclamation-triangle me-2"></i>Confirmar Exclusão
                                                        </h5>
                                                        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body text-white text-start">
                                                        Tem certeza que deseja deletar este aviso? Esta ação não pode ser desfeita.
                                                    </div>
                                                    <div class="modal-footer" style="border-top: 1px solid #f39c12;">
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
                <div class="p-4 text-center">
                    <div class="alert alert-info" role="alert" style="background-color: #0f2438; color: #17a2b8; border-color: #17a2b8;">
                        <i class="bi bi-info-circle me-2"></i>Nenhum aviso cadastrado. 
                        <a href="{{ route('avisos.create') }}" class="alert-link text-warning">Clique aqui para criar um novo aviso.</a>
                    </div>
                </div>
            @endif
        </div>
    </div>
</div>

<style>
    .table-hover tbody tr:hover {
        background-color: #13293A !important;
        transition: background-color 0.3s ease;
    }

    .btn-warning {
        background-color: #f39c12;
        border-color: #f39c12;
        color: #13293A;
        font-weight: bold;
    }

    .btn-warning:hover {
        background-color: #e67e22;
        border-color: #e67e22;
        color: #fff;
    }

    .btn-outline-info {
        color: #17a2b8;
        border-color: #17a2b8;
    }
    .btn-outline-info:hover {
        background-color: #17a2b8;
        color: #fff;
    }

    .btn-outline-warning {
        color: #f39c12;
        border-color: #f39c12;
    }
    .btn-outline-warning:hover {
        background-color: #f39c12;
        color: #13293A;
    }

    .btn-outline-danger {
        color: #dc3545;
        border-color: #dc3545;
    }
    .btn-outline-danger:hover {
        background-color: #dc3545;
        color: #fff;
    }

    .modal-content {
        box-shadow: 0 0 20px rgba(0,0,0,0.5);
    }
</style>
@endsection
