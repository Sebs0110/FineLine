@extends('estrutura')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <div class="card" style="background-color: #1a3a52; border-color: #f39c12;">
                <div class="card-header" style="background-color: #13293A; border-color: #f39c12;">
                    <h4 class="text-warning mb-0">
                        <i class="bi bi-eye me-2"></i>Visualizar Aviso
                    </h4>
                </div>
                <div class="card-body">
                    <!-- Campo ID -->
                    <div class="mb-3">
                        <label class="form-label text-white">
                            <i class="bi bi-hash me-2"></i>ID
                        </label>
                        <p class="text-white">{{ $aviso->avi_id }}</p>
                    </div>

                    <!-- Campo Descrição -->
                    <div class="mb-3">
                        <label class="form-label text-white">
                            <i class="bi bi-file-text me-2"></i>Descrição do Aviso
                        </label>
                        <div class="alert alert-info" role="alert" style="background-color: #0f2438; border-color: #f39c12; color: #fff;">
                            {{ $aviso->avi_descricao }}
                        </div>
                    </div>

                    <!-- Campo Data de Cadastro -->
                    <div class="mb-3">
                        <label class="form-label text-white">
                            <i class="bi bi-calendar-event me-2"></i>Data de Cadastro
                        </label>
                        <p class="text-white">{{ $aviso->avi_datacadastro->format('d/m/Y') }}</p>
                    </div>

                    <!-- Informações de Auditoria -->
                    <hr style="border-color: #f39c12;">
                    <div class="row">
                        <div class="col-md-6">
                            <label class="form-label text-white">
                                <i class="bi bi-calendar-plus me-2"></i>Criado em
                            </label>
                            <p class="text-white">{{ $aviso->created_at->format('d/m/Y H:i:s') }}</p>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label text-white">
                                <i class="bi bi-calendar-check me-2"></i>Atualizado em
                            </label>
                            <p class="text-white">{{ $aviso->updated_at->format('d/m/Y H:i:s') }}</p>
                        </div>
                    </div>

                    <!-- Botões de Ação -->
                    <div class="row mt-4">
                        <div class="col-md-4">
                            <a href="{{ route('avisos.edit', $aviso->avi_id) }}" class="btn btn-warning w-100">
                                <i class="bi bi-pencil me-2"></i>Editar
                            </a>
                        </div>
                        <div class="col-md-4">
                            <button type="button" class="btn btn-danger w-100" data-bs-toggle="modal" data-bs-target="#deleteModal">
                                <i class="bi bi-trash me-2"></i>Deletar
                            </button>
                        </div>
                        <div class="col-md-4">
                            <a href="{{ route('avisos.index') }}" class="btn btn-secondary w-100">
                                <i class="bi bi-arrow-left me-2"></i>Voltar
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal de Confirmação de Exclusão -->
<div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content" style="background-color: #1a3a52;">
            <div class="modal-header" style="border-color: #f39c12;">
                <h5 class="modal-title text-warning" id="deleteModalLabel">
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

<style>
    .card {
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.3);
    }

    .btn-warning {
        background-color: #f39c12;
        border-color: #f39c12;
        font-weight: 500;
    }

    .btn-warning:hover {
        background-color: #e67e22;
        border-color: #e67e22;
    }

    .btn-danger {
        background-color: #dc3545;
        border-color: #dc3545;
        font-weight: 500;
    }

    .btn-danger:hover {
        background-color: #c82333;
        border-color: #c82333;
    }

    .btn-secondary {
        background-color: #6c757d;
        border-color: #6c757d;
        font-weight: 500;
    }

    .btn-secondary:hover {
        background-color: #5a6268;
        border-color: #5a6268;
    }

    .form-label {
        font-weight: 500;
        margin-bottom: 0.5rem;
    }

    .alert {
        padding: 1rem;
        border-radius: 0.25rem;
    }
</style>
@endsection
