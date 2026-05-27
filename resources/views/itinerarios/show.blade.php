@extends('estrutura')

@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card" style="background-color: #13293A; border: none; color: white;">
                    <div class="card-header border-warning d-flex justify-content-between align-items-center">
                        <h3 class="text-warning mb-0"><i class="bi bi-eye me-2"></i>Detalhes do Itinerário</h3>
                        <a href="{{ route('itinerarios.index') }}" class="btn btn-sm btn-secondary">
                            <i class="bi bi-arrow-left me-1"></i>Voltar
                        </a>
                    </div>
                    <div class="card-body">
                        <div class="row mb-4">
                            <div class="col-md-4 text-warning fw-bold">ID:</div>
                            <div class="col-md-8 text-white">{{ $itinerario->iti_id }}</div>
                        </div>
                        <div class="row mb-4">
                            <div class="col-md-4 text-warning fw-bold">Rota:</div>
                            <div class="col-md-8 text-white">{{ $itinerario->rota->rot_nome }}</div>
                        </div>
                        <div class="row mb-4">
                            <div class="col-md-4 text-warning fw-bold">Origem:</div>
                            <div class="col-md-8 text-white">{{ $itinerario->rota->rot_origem }}</div>
                        </div>
                        <div class="row mb-4">
                            <div class="col-md-4 text-warning fw-bold">Destino:</div>
                            <div class="col-md-8 text-white">{{ $itinerario->rota->rot_destino }}</div>
                        </div>
                        <div class="row mb-4">
                            <div class="col-md-4 text-warning fw-bold">Horário de Saída:</div>
                            <div class="col-md-8 text-white">{{ \Carbon\Carbon::parse($itinerario->iti_horariosaida)->format('H:i') }}</div>
                        </div>
                        <div class="row mb-4">
                            <div class="col-md-4 text-warning fw-bold">Dia da Semana:</div>
                            <div class="col-md-8 text-white">{{ $itinerario->iti_diadasemana }}</div>
                        </div>
                        <div class="row mb-4">
                            <div class="col-md-4 text-warning fw-bold">Criado em:</div>
                            <div class="col-md-8 text-white">{{ $itinerario->created_at->format('d/m/Y H:i') }}</div>
                        </div>
                        <div class="row mb-4">
                            <div class="col-md-4 text-warning fw-bold">Última Atualização:</div>
                            <div class="col-md-8 text-white">{{ $itinerario->updated_at->format('d/m/Y H:i') }}</div>
                        </div>

                        <div class="d-flex justify-content-end mt-4">
                            <a href="{{ route('itinerarios.edit', $itinerario->iti_id) }}" class="btn btn-warning me-2">
                                <i class="bi bi-pencil me-2"></i>Editar
                            </a>
                            <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal">
                                <i class="bi bi-trash me-2"></i>Deletar
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal de Confirmação de Exclusão -->
    <div class="modal fade" id="deleteModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content" style="background-color: #1a3a52;">
                <div class="modal-header" style="border-color: #f39c12;">
                    <h5 class="modal-title text-warning">
                        <i class="bi bi-exclamation-triangle me-2"></i>Confirmar Exclusão
                    </h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body text-white">
                    Tem certeza que deseja deletar este itinerário?
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
@endsection
