@extends('estrutura')

@section('content')
    <div class="mb-4">
        <h1 class="text-warning"><i class="bi bi-eye me-2"></i>Detalhes da Parada</h1>
        <p class="text-white-50">Informações detalhadas da parada selecionada.</p>
    </div>

    <div class="card border-0 shadow-sm" style="background-color: #13293A;">
        <div class="card-body p-4">
            <div class="row g-4">
                <div class="col-md-6">
                    <label class="text-warning fw-bold d-block mb-1">Nome da Parada</label>
                    <div class="p-3 bg-dark rounded border border-secondary text-white">
                        {{ $parada->par_nome }}
                    </div>
                </div>

                <div class="col-md-6">
                    <label class="text-warning fw-bold d-block mb-1">Endereço</label>
                    <div class="p-3 bg-dark rounded border border-secondary text-white">
                        {{ $parada->par_endereco }}
                    </div>
                </div>

                <div class="col-md-6">
                    <label class="text-warning fw-bold d-block mb-1">Latitude</label>
                    <div class="p-3 bg-dark rounded border border-secondary text-white">
                        {{ $parada->par_latitude ?? 'Não informada' }}
                    </div>
                </div>

                <div class="col-md-6">
                    <label class="text-warning fw-bold d-block mb-1">Longitude</label>
                    <div class="p-3 bg-dark rounded border border-secondary text-white">
                        {{ $parada->par_longitude ?? 'Não informada' }}
                    </div>
                </div>
            </div>

            <div class="mt-4 d-flex gap-2">
                <a href="{{ route('paradas.edit', $parada->par_id) }}" class="btn btn-warning fw-bold px-4">
                    <i class="bi bi-pencil me-1"></i> Editar
                </a>
                <a href="{{ route('paradas.index') }}" class="btn btn-outline-light px-4">
                    Voltar para Listagem
                </a>
            </div>
        </div>
    </div>
@endsection
