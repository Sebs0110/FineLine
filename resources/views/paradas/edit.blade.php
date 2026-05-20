@extends('estrutura')

@section('content')
    <div class="mb-4">
        <h1 class="text-warning"><i class="bi bi-pencil me-2"></i>Editar Parada</h1>
        <p class="text-white-50">Atualize as informações da parada <strong>{{ $parada->par_nome }}</strong>.</p>
    </div>

    <div class="card border-0 shadow-sm" style="background-color: #13293A;">
        <div class="card-body p-4">
            <form action="{{ route('paradas.update', $parada->par_id) }}" method="POST" id="form-parada">
                @csrf
                @method('PUT')
                <div class="row g-3">
                    <div class="col-md-6">
                        <label for="par_nome" class="form-label text-warning fw-bold">Nome da Parada</label>
                        <input type="text" class="form-control bg-dark text-white border-secondary @error('par_nome') is-invalid @enderror" 
                               id="par_nome" name="par_nome" value="{{ old('par_nome', $parada->par_nome) }}">
                        @error('par_nome')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-md-6">
                        <label for="par_endereco" class="form-label text-warning fw-bold">Endereço</label>
                        <input type="text" class="form-control bg-dark text-white border-secondary @error('par_endereco') is-invalid @enderror" 
                               id="par_endereco" name="par_endereco" value="{{ old('par_endereco', $parada->par_endereco) }}">
                        @error('par_endereco')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-md-6">
                        <label for="par_latitude" class="form-label text-warning fw-bold">Latitude (Opcional)</label>
                        <input type="text" class="form-control bg-dark text-white border-secondary" 
                               id="par_latitude" name="par_latitude" value="{{ old('par_latitude', $parada->par_latitude) }}">
                    </div>

                    <div class="col-md-6">
                        <label for="par_longitude" class="form-label text-warning fw-bold">Longitude (Opcional)</label>
                        <input type="text" class="form-control bg-dark text-white border-secondary" 
                               id="par_longitude" name="par_longitude" value="{{ old('par_longitude', $parada->par_longitude) }}">
                    </div>
                </div>

                <div class="mt-4 d-flex gap-2">
                    <button type="submit" class="btn btn-warning fw-bold px-4">
                        <i class="bi bi-check-lg me-1"></i> Atualizar Parada
                    </button>
                    <a href="{{ route('paradas.index') }}" class="btn btn-outline-light px-4">
                        Cancelar
                    </a>
                </div>
            </form>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#form-parada').on('submit', function() {
                $(this).find('button[type="submit"]').prop('disabled', true).html('<span class="spinner-border spinner-border-sm me-2"></span>Salvando...');
            });
        });
    </script>
@endsection
