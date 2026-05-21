@extends('estrutura')

@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card" style="background-color: #13293A; border: none;">
                    <div class="card-header" style="border-bottom: 1px solid #f39c12;">
                        <h4 class="text-warning mb-0"><i class="bi bi-eye me-2"></i>Detalhes da Rota</h4>
                    </div>
                    <div class="card-body text-white">
                        <div class="row mb-3">
                            <div class="col-md-4 fw-bold text-warning">ID:</div>
                            <div class="col-md-8">{{ $rota->rot_id }}</div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-4 fw-bold text-warning">Nome:</div>
                            <div class="col-md-8">{{ $rota->rot_nome }}</div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-4 fw-bold text-warning">Origem:</div>
                            <div class="col-md-8">{{ $rota->rot_origem }}</div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-4 fw-bold text-warning">Destino:</div>
                            <div class="col-md-8">{{ $rota->rot_destino }}</div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-4 fw-bold text-warning">Duração Estimada:</div>
                            <div class="col-md-8">{{ $rota->rot_duracao_estimada }}</div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-4 fw-bold text-warning">Criado em:</div>
                            <div class="col-md-8">{{ $rota->created_at ? $rota->created_at->format('d/m/Y H:i:s') : 'N/A' }}</div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-4 fw-bold text-warning">Atualizado em:</div>
                            <div class="col-md-8">{{ $rota->updated_at ? $rota->updated_at->format('d/m/Y H:i:s') : 'N/A' }}</div>
                        </div>

                        <div class="row mt-4">
                            <div class="col-md-6">
                                <a href="{{ route('rotas.edit', $rota->rot_id) }}" class="btn btn-warning w-100">
                                    <i class="bi bi-pencil me-2"></i>Editar
                                </a>
                            </div>
                            <div class="col-md-6">
                                <a href="{{ route('rotas.index') }}" class="btn btn-secondary w-100">
                                    <i class="bi bi-arrow-left me-2"></i>Voltar
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <style>
        .btn-warning { background-color: #f39c12; border-color: #f39c12; font-weight: 500; }
        .btn-secondary { background-color: #6c757d; border-color: #6c757d; font-weight: 500; }
    </style>
@endsection
