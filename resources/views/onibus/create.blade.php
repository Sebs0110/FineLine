@extends('estrutura')

@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card" style="background-color: #13293A; border: none;">
                    <div class="card-header" style="border-bottom: 1px solid #f39c12;">
                        <h4 class="text-warning mb-0"><i class="bi bi-plus-circle me-2"></i>Novo Ônibus</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('onibus.store') }}" method="POST" id="formOnibus">
                            @csrf

                            <div class="mb-3">
                                <label for="oni_placa" class="form-label text-white">Placa <span class="text-danger">*</span></label>
                                <input type="text" class="form-control @error('oni_placa') is-invalid @enderror" id="oni_placa" name="oni_placa" value="{{ old('oni_placa') }}" required style="background-color: #0f2438; color: #fff; border-color: #f39c12;">
                                @error('oni_placa') <div class="invalid-feedback d-block">{{ $message }}</div> @enderror
                            </div>

                            <div class="mb-3">
                                <label for="oni_renavan" class="form-label text-white">Renavam <span class="text-danger">*</span></label>
                                <input type="text" class="form-control @error('oni_renavan') is-invalid @enderror" id="oni_renavan" name="oni_renavan" value="{{ old('oni_renavan') }}" required style="background-color: #0f2438; color: #fff; border-color: #f39c12;">
                                @error('oni_renavan') <div class="invalid-feedback d-block">{{ $message }}</div> @enderror
                            </div>

                            <div class="mb-3">
                                <label for="oni_modelo" class="form-label text-white">Modelo <span class="text-danger">*</span></label>
                                <input type="text" class="form-control @error('oni_modelo') is-invalid @enderror" id="oni_modelo" name="oni_modelo" value="{{ old('oni_modelo') }}" required maxlength="35" style="background-color: #0f2438; color: #fff; border-color: #f39c12;">
                                @error('oni_modelo') <div class="invalid-feedback d-block">{{ $message }}</div> @enderror
                            </div>

                            <div class="row mt-4">
                                <div class="col-md-6">
                                    <button type="submit" class="btn btn-warning w-100" id="btnSalvar">
                                        <i class="bi bi-check-circle me-2"></i>Salvar
                                    </button>
                                </div>
                                <div class="col-md-6">
                                    <a href="{{ route('onibus.index') }}" class="btn btn-secondary w-100">
                                        <i class="bi bi-arrow-left me-2"></i>Voltar
                                    </a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script type="module">
        $(document).ready(function(){
            $('#formOnibus').on('submit', function(e){
                if(!$('#oni_placa').val() || !$('#oni_renavan').val() || !$('#oni_modelo').val()){
                    e.preventDefault();
                    alert('Por favor, preencha todos os campos obrigatórios.');
                    return false;
                }
                $('#btnSalvar').prop('disabled', true).html('<span class="spinner-border spinner-border-sm me-2"></span>Salvando...');
            });
        });
    </script>

    <style>
        .form-control:focus { background-color: #0f2438 !important; color: #fff !important; border-color: #f39c12 !important; box-shadow: 0 0 0 0.2rem rgba(243, 156, 18, 0.25) !important; }
        .btn-warning { background-color: #f39c12; border-color: #f39c12; font-weight: 500; }
        .btn-secondary { background-color: #6c757d; border-color: #6c757d; font-weight: 500; }
    </style>
@endsection
