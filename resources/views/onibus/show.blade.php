@extends('estrutura')

@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card" style="background-color: #13293A; border: none;">
                    <div class="card-header" style="border-bottom: 1px solid #f39c12;">
                        <h4 class="text-warning mb-0"><i class="bi bi-eye me-2"></i>Detalhes do Ônibus</h4>
                    </div>
                    <div class="card-body text-white">
                        <div class="row mb-3">
                            <div class="col-md-4 fw-bold text-warning">ID:</div>
                            <div class="col-md-8">{{ $onibus->oni_id }}</div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-4 fw-bold text-warning">Placa:</div>
                            <div class="col-md-8">{{ $onibus->oni_placa }}</div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-4 fw-bold text-warning">Renavam:</div>
                            <div class="col-md-8">{{ $onibus->oni_renavan }}</div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-4 fw-bold text-warning">Modelo:</div>
                            <div class="col-md-8">{{ $onibus->oni_modelo }}</div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-4 fw-bold text-warning">Criado em:</div>
                            <div class="col-md-8">{{ $onibus->created_at ? $onibus->created_at->format('d/m/Y H:i:s') : 'N/A' }}</div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-4 fw-bold text-warning">Atualizado em:</div>
                            <div class="col-md-8">{{ $onibus->updated_at ? $onibus->updated_at->format('d/m/Y H:i:s') : 'N/A' }}</div>
                        </div>

                        <div class="row mt-4">
                            <div class="col-md-6">
                                <a href="{{ route('onibus.edit', $onibus->oni_id) }}" class="btn btn-warning w-100">
                                    <i class="bi bi-pencil me-2"></i>Editar
                                </a>
                            </div>
                            <div class="col-md-6">
                                <a href="{{ route('onibus.index') }}" class="btn btn-secondary w-100">
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
