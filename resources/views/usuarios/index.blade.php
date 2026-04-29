@extends('estrutura')

@section('content')
    <div class="container-fluid py-4">
        <!-- Cabeçalho -->
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1 class="text-warning fw-bold" style="font-size: 2.5rem;">
                <i class="bi bi-people-fill me-2"></i>Usuários
            </h1>
            <a href="{{ route('usuarios.create') }}" class="btn btn-warning shadow-sm">
                <i class="bi bi-plus-circle me-2"></i>Novo Usuário
            </a>
        </div>

        <!-- Card da Tabela -->
        <div class="card shadow-lg border-0" style="background-color: #0f2438; border: 1px solid #f39c12 !important; border-radius: 8px;">
            <div class="card-header border-0 py-3" style="background-color: #0f2438; border-bottom: 1px solid #f39c12 !important;">
                <h5 class="mb-0 text-warning">
                    <i class="bi bi-list me-2"></i>Lista de Usuários
                </h5>
            </div>
            <div class="card-body p-0">
                @if($users->count() > 0)
                    <div class="table-responsive">
                        <table class="table table-hover mb-0" style="background-color: #fff;">
                            <thead>
                            <tr style="border-bottom: 2px solid #f39c12;">
                                <th class="text-warning px-4 py-3" style="background-color: #13293A; border: none;">ID</th>
                                <th class="text-warning py-3" style="background-color: #13293A; border: none;">Nome</th>
                                <th class="text-warning py-3" style="background-color: #13293A; border: none;">E-mail</th>
                                <th class="text-warning py-3 text-center" style="background-color: #13293A; border: none;">Ações</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($users as $user)
                                <tr style="border-bottom: 1px solid #dee2e6;">
                                    <td class="px-4 py-3 align-middle" style="color: #333;">{{ $user->usu_id }}</td>
                                    <td class="py-3 align-middle" style="color: #333;">{{ $user->usu_nome }}</td>
                                    <td class="py-3 align-middle" style="color: #333;">{{ $user->usu_email }}</td>
                                    <td class="py-3 text-center align-middle">
                                        <div class="btn-group" role="group">
                                            <a href="{{ route('usuarios.show', $user->usu_id) }}" class="btn btn-sm btn-outline-info" title="Visualizar">
                                                <i class="bi bi-eye"></i>
                                            </a>
                                            <a href="{{ route('usuarios.edit', $user->usu_id) }}" class="btn btn-sm btn-outline-warning" title="Editar">
                                                <i class="bi bi-pencil"></i>
                                            </a>
                                            <button type="button" class="btn btn-sm btn-outline-danger" data-bs-toggle="modal" data-bs-target="#deleteModal{{ $user->usu_id }}" title="Deletar">
                                                <i class="bi bi-trash"></i>
                                            </button>
                                        </div>

                                        <!-- Modal de Confirmação de Exclusão (Copiado dos Avisos) -->
                                        <div class="modal fade" id="deleteModal{{ $user->usu_id }}" tabindex="-1" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content" style="background-color: #13293A; border: 1px solid #f39c12;">
                                                    <div class="modal-header" style="border-bottom: 1px solid #f39c12;">
                                                        <h5 class="modal-title text-warning">
                                                            <i class="bi bi-exclamation-triangle me-2"></i>Confirmar Exclusão
                                                        </h5>
                                                        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body text-white text-start">
                                                        Tem certeza que deseja deletar este usuário? Esta ação não pode ser desfeita.
                                                    </div>
                                                    <div class="modal-footer" style="border-top: 1px solid #f39c12;">
                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                                                        <form action="{{ route('usuarios.destroy', $user->usu_id) }}" method="POST" style="display: inline;">
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
                            <i class="bi bi-info-circle me-2"></i>Nenhum usuário cadastrado.
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>

    <style>
        .table-hover tbody tr:hover {
            background-color: #f8f9fa !important;
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
